<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Offer;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function transactions()
    {
        $transactions = request()->user()->transactions()->simplePaginate(12);
        $transactions->load('bill');
        return response()->json($transactions);
    }
    public function offers()
    {
        $offers = request()->user()->offers()->orderBy('expires_at', 'asc')->cursorPaginate(12);
        return response()->json($offers);
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
    public function general(Request $request)
    {
        $user_id = $request->user()->id;
        $invoices = DB::table('invoices')
            ->selectRaw('count(`id`) AS aggregate')
            ->where('user_id', 1)
            ->whereNull('paid_at')
            ->toSql();
        $tickets = DB::table('tickets')
            ->selectRaw('count(`id`) AS aggregate')
            ->where('user_id', 1)
            ->whereNull('closed_at')
            ->toSql();
        $orders_count = DB::table('orders')
            ->selectRaw('count(`id`) AS aggregate')
            ->where('user_id', 1)
            ->whereNull('finished_at')
            ->toSql();
        $counts = DB::selectOne(
            "SELECT ($invoices) as invoices_count, ($tickets) as tickets_count, ($orders_count) as orders_count",
            [$user_id, $user_id, $user_id]
        );
        return response()->json($counts);
    }
    public function ordersStat()
    {

    }
    // public function dashboard()
    // {
        
    // }
}