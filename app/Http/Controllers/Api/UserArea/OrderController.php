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
                    'type'
                ])
                ->latest()
                ->simplePaginate(4);
        $orders->load('items.service');
        return response()->json($orders);
    }
    public function show($order)
    {
        $order = Order::findOrFail($order);
        // policy here
        $order->load('items');
        return response()->json([
            'okay' => true,
            'order' => $order
        ]);
    }
}