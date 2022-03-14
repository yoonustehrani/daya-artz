<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function transactions()
    {
        $transactions = request()->user()->transactions()->latest()->simplePaginate(12);
        $transactions->append(['provider_fa', 'status_fa']);
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
        $invoices_count = Invoice::where('user_id', $user_id)->active()->unExpired()->whereNull('paid_at')->count();
        $tickets_count = Ticket::where('user_id', $user_id)->whereNull('closed_at')->count();
        $orders_count = Order::where('user_id', $user_id)->whereNull('finished_at')->count();
        return response()->json(compact('invoices_count', 'tickets_count', 'orders_count'));
    }
    public function ordersStat(Request $request)
    {
        $user_id = $request->user()->id;
        $completed = Order::where('user_id', $user_id)->whereNotNull('finished_at');
        return response()->json([
            'completed' => $completed->count(),
            'awaiting' => 0,
            'prepaid' => 0
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
        $transactions = Transaction::select('id', 'amount', 'status', 'provider', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->where('status', 'verified')
            ->where('user_id', $user_id)
            ->limit(3)
            ->get()
            ->append(['text']);
        $notifications = $request->user()->unreadNotifications()->limit(3)->get();
        return response()->json(compact('orders', 'transactions', 'notifications'));
    }
    public function financials(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'orders' => $user->orders()->count(),
            'paid_invoices' => $user->invoices()->paid()->count(),
            'unpaid_invoices' => $user->invoices()->paid(false)->count(),
            'prepaid_invoices' => $user->invoices()->count()
        ]);
    }
}