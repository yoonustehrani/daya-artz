<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;
use App\Models\Offer;

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
        $offers = request()->user()->offers()->orderBy('expires_at', 'asc')->cursorPaginate(12);
        return response()->json($offers);
    }
    public function invoices()
    {
        $invoices = request()->user()->invoices()->cursorPaginate(10);
        return response()->json($invoices);
    }
}