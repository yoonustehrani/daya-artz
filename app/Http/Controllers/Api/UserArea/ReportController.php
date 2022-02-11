<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
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
    public function orders(ReportRequest $request)
    {
        $orders = $request->user()
                ->orders()
                ->limit(intval($request->query('limit')));
        switch ($request->query('mode')) {
            case 'latest':
                $orders->latest();
                break;
            case 'random':
                $orders->inRandomOrder();
                break;
        }
        return response()->json($orders->get());
    }
}