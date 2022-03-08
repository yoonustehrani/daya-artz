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
    public function store(Request $request, $bill, $method)
    {
        $bill = Bill::select(['id', 'amount', 'title', 'paid_at'])->findOrFail($bill);
        abort_if($bill->paid_at, 403, __('messages.invoices.already-paid'));
        $transaction = new Transaction([
            'amount' => $bill->amount,
            'status' => 'pending',
            'provider' => $method,
            'user_id' => $request->user()->id
        ]);
        // return $transaction;
        if (in_array($method, $this->util->getDrivers())) {
            $provider = (new \App\Utils\Payment)->getDriver($method);
            $provider->sandbox();
            $result = $provider->purchase($bill->amount, $bill->title); // metadata
            if ($result['okay']) {
                $transaction->transaction_id = $result['transaction_id'];
                // $bill->transactions()->save($transaction);
                return [
                    'okay' => true,
                    'gateway' => $result['gateway'],
                    'transaction' => $transaction
                ];
            }
        } else {
            // $method === 'cash'
            // $transaction->save();
            return [
                'okay' => true,
                'transaction' => $transaction
            ];
        }
        return [
            'okay' => false
        ];
    }
}