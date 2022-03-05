<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = request()
                ->user()
                ->orders()
                ->select([
                    'id',
                    'code',
                    'method',
                    'status',
                    'type',
                    'created_at'
                ])
                ->latest()
                ->simplePaginate(4);
        $orders->load([
            'items' => function($q) {
                $q->select([
                    'id',
                    'service_id',
                    'order_id'
                ])->with(['service' => function($q) {
                    $q->select([
                        'id', 'title', 'icon_class'
                    ]);
                }]);
            }
        ]);
        return response()->json($orders);
    }
    public function show($order)
    {
        $order = request()->user()->orders()->findOrFail($order);
        $items = $order->items()->with('service')->get();
        return response()->json([
            'okay' => true,
            'order' => $order,
            'items' => $items,
            'statuses' => __('userarea.orders.status')
        ]);
    }
    public function item(Order $order, $itemId)
    {
        
    }
}