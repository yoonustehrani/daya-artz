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
        $first = DB::table('invoices')->count('id');


        return $first;
        // $queries = [
        //     'invoices_count' => 'SELECT COUNT(i.id) FROM `invoices` as i WHERE `paid_at` IS NULL',
        //     'tickets_count' => 'SELECT COUNT(t.id) FROM `tickets` as t WHERE `closed_at` IS NULL',
        //     'orders_count' => 'SELECT COUNT(o.id) FROM `orders` as o WHERE `finished_at` IS NULL'
        // ];
        // $query = 'SELECT ';
        // foreach ($queries as $key => $q) {
        //     $q .= " AND `user_id` = ?";
        //     $query .= "({$q}) as {$key}";
        //     if ($key !== 'orders_count') {
        //         $query .= ', ';
        //     }
        // }
        // // $query
        // $counts = \DB::select(
        //     $query,
        //     // "SELECT ({$queries[0]}) as invoices_count, ({$queries[1]}) as tickets_count, ({$queries[2]}) as orders_count",
        //     [1,1,1] // $request->user()->id
        // );

        // dd($counts);
        // return $counts;
        // $tickets = []
    }
    public function ordersStat()
    {

    }
    // public function dashboard()
    // {
        
    // }
}