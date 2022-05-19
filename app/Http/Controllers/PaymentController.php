<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Transaction;
use App\Utils\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public $util;
    public function __construct()
    {
        $this->util = new Payment;
    }
    protected function getProvider($provider)
    {
        return (new \App\Utils\Payment)->getDriver($provider);
    }
    protected function transactionView($transaction, $bill)
    {
        $view = $transaction->status === Transaction::VERIFIED_STATUS ? 'success' : 'canceled';
        return view("pages.payment.$view", compact('transaction', 'bill'));
    }
    public function store(Request $request, $bill, $method)
    {
        $bill = Bill::select(['id', 'amount', 'title', 'paid_at', 'invoice_id'])->findOrFail($bill);
        abort_if($bill->paid_at, 403, __('messages.invoices.already-paid'));
        $transaction = new Transaction([
            'amount' => $bill->amount,
            'status' => Transaction::PENDING_STATUS,
            'provider' => $method,
            'user_id' => $request->user()->id
        ]);
        if (in_array($method, $this->util->getDrivers())) {
            $provider = $this->getProvider($method);
            $result = $provider->purchase($bill->amount, $bill->title); // metadata
            if ($result['okay']) {
                $transaction->transaction_id = $result['transaction_id'];
                $bill->transactions()->save($transaction);
                return [
                    'okay' => true,
                    'gateway' => $result['gateway'],
                    'transaction' => $transaction
                ];
            }
        } else {
            $transaction->details = ['user_data' => $request->input('details')];
            $transaction->transaction_id = $request->input('details.transaction_code');
            $bill->transactions()->save($transaction);
            return [
                'okay' => true,
                'transaction' => $transaction,
                'message' => __('messages.transaction_saved')
            ];
        }
        return [
            'okay' => false
        ];
    }
    public function update(Request $request, $driver)
    {
        $payment_datetime = now();
        switch ($driver) {
            case 'zarinpal':
                $request->validate([
                    'Authority' => 'required|string',
                    'Status' => 'required'
                ]);
                $transaction_id = $request->query('Authority');
                $transaction = Transaction::where('transaction_id', $transaction_id)
                        ->where('status', 'pending')
                        ->where('provider', $driver)
                        ->firstOrFail();
                $bill = $transaction->bill()->with('invoice')->firstOrFail();
                if ($request->query('Status') === 'OK') {
                    $zp = $this->getProvider('zarinpal');
                    $valid = $zp->verify($transaction->amount, $transaction->transaction_id);
                    if ($valid['okay']) {
                        try {
                            \DB::beginTransaction();
                            $bill->paid_at = $payment_datetime;
                            $bill->save();
                            if ($bill->invoice->isPaid()) {
                                $bill->invoice->paid_at = $payment_datetime;
                                $bill->invoice->save();
                            }
                            $transaction->status = Transaction::VERIFIED_STATUS;
                            $transaction->details = ['ref_id' => $valid['ref_id'], 'card_pan' => $valid['card_pan']];
                            $transaction->save();
                            \DB::commit();
                            return $this->transactionView($transaction, $bill);;
                        } catch (\Exception $e) {
                            \DB::rollback();
                        }
                    }
                }
                $transaction->status = Transaction::CANCELED_STATUS;
                $transaction->save();
                return $this->transactionView($transaction, $bill);
                break;
            default:
                abort(403);
                break;
        }
    }
}