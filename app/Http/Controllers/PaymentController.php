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
    public function getProvider($provider)
    {
        return (new \App\Utils\Payment)->getDriver($provider);
    }
    public function store(Request $request, $bill, $method)
    {
        $bill = Bill::select(['id', 'amount', 'title', 'paid_at', 'invoice_id'])->findOrFail($bill);
        abort_if($bill->paid_at, 403, __('messages.invoices.already-paid'));
        $transaction = new Transaction([
            'amount' => $bill->amount,
            'status' => 'pending',
            'provider' => $method,
            'user_id' => $request->user()->id
        ]);
        // $transaction->details = ['redirect_after' => route('userarea', ['path' => "finance/invoices/{$bill->invoice_id}"])];
        if (in_array($method, $this->util->getDrivers())) {
            $provider = $this->getProvider($method);
            $provider->sandbox();
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
            // $method === 'cash'
            $transaction->save();
            return [
                'okay' => true,
                'transaction' => $transaction
            ];
        }
        return [
            'okay' => false
        ];
    }
    public function update(Request $request, $driver)
    {
        switch ($driver) {
            case 'zarinpal':
                $request->validate([
                    'Authority' => 'required|string',
                    'Status' => 'required'
                ]);
                $transaction_id = $request->query('Authority');
                $transaction = Transaction::where('transaction_id', $transaction_id)->where('status', 'pending')->where('provider', $driver)->firstOrFail();
                if ($request->query('Status') === 'OK') {
                    $zp = $this->getProvider('zarinpal');
                    $zp->sandbox();
                    $valid = $zp->verify($transaction->amount, $transaction->transaction_id);
                    if ($valid['okay']) {
                        $bill = $transaction->bill()->with('invoice')->firstOrFail();
                        try {
                            \DB::beginTransaction();
                                $now = now();
                                $bill->paid_at = $now;
                                $bill->save();
                                // $bill->invoice = $now;
                                // $bill->invoice->save();
                                $transaction->status = 'verified';
                                $transaction->save();
                            \DB::commit();
                            return ['okay' => true, 'transaction' => $transaction];
                        } catch (\Exception $e) {
                            \DB::rollback();
                        }
                    }
                }
                $transaction->status = 'canceled';
                $transaction->save();
                return ['okay' => false, 'transaction' => $transaction];
                break;
            default:
                abort(403);
                break;
        }
    }
}