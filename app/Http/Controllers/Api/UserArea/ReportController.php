<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function transactions()
    {
        $transactions = request()->user()->transactions()->simplePaginate();
        $transactions->load('bill');
        return $transactions;
    }
}