<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Order;
use App\Models\Transaction;
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
            ->where('user_id', $user_id)
            ->whereNull('paid_at')
            ->toSql();
        $tickets = DB::table('tickets')
            ->selectRaw('count(`id`) AS aggregate')
            ->where('user_id', $user_id)
            ->whereNull('closed_at')
            ->toSql();
        $orders_count = DB::table('orders')
            ->selectRaw('count(`id`) AS aggregate')
            ->where('user_id', $user_id)
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
        $completed = DB::table('orders')
            ->selectRaw('count(`id`) AS aggregate')
            ->where('user_id', 1)
            ->whereNotNull('finished_at')
            ->toSql();
        return response()->json([
            'completed' => random_int(0, 12),
            'awaiting' => random_int(0, 12),
            'prepaid' => random_int(0, 12)
        ]);
    }
    public function latest(Request $request)
    {
        $user_id = $request->user()->id;
        $orders = Order::latest()
            ->select('id', 'method', 'code')
            ->where('user_id', $user_id)
            ->limit(3)
            ->get()
            ->append(['text']);
        $transactions = Transaction::orderBy('updated_at', 'desc')
            ->select('id', 'amount', 'status', 'provider', 'updated_at')
            ->limit(5)
            ->where('user_id', $user_id)
            ->get()
            ->append('provider_fa');
        $notifications = [];
        return response()->json(compact('orders', 'transactions', 'notifications'));
    }
}