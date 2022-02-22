<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request, Bill $bill)
    {
        abort_if($bill->status === 'paid', 403, __('messages.invoices.already-paid'));
        $provider = (new \App\Utils\Payment)->getDriver('zarinpal');
        $result = $provider->purchase($bill->amount, $bill->title); // metadata
        $transaction = new Transaction([
            
        ]);
        dd($result);
    }
}
