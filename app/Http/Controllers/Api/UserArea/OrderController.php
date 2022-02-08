<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;

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
}