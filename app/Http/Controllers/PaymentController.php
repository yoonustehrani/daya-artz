<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request, Bill $bill, $method)
    {
        abort_if($bill->status === 'paid', 403, __('messages.invoices.already-paid'));
        $e_payment = ['zarinpal'];
        $transaction = new Transaction([
            'amount' => $bill->amount,
            'status' => 'pending',
            'provider' => $method,
            'user_id' => $request->user()->id
        ]);
        if (in_array($method, $e_payment)) {
            $provider = (new \App\Utils\Payment)->getDriver($method);
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
        } elseif($method === 'cash') {
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
}