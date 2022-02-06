<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function transactions()
    {
        $transactions = request()->user()->transactions()->paginate(12);
        $transactions->load('bill');
        return response()->json($transactions);
    }
    public function offers()
    {
        $offers = request()->user()->offers()->paginate(12); // ->orderBy('expires_at', 'desc')
        return response()->json($offers);
    }
}