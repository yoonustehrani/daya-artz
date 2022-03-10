<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;

class OrderItemController extends Controller
{
    public function show($order, $item_id)
    {
        $order = Order::select(['id', 'code', 'method', 'user_id'])->findOrFail($order);
        $this->authorize('view', $order);
        $item = $order->items()->select(
            ['id', 'title', 'service_id', 'plan_id', 'status', 'status_info', 'description', 'due_date', 'finished_at', 'created_at', 'updated_at']
        )->findorFail($item_id)->append(['status_fa', 'normal', 'canceled']);
        $item->load([
            'service' => function($q) {
                $q->select(['id', 'title', 'slug']);
            }
        ]);
        if ($item->service) {
            $item->service->append('uri');
            if ($item->plan_id) {
                $item->load([
                    'selected_plan' => function($q) use($item) {
                        $q->select(['id', 'title', 'caption', 'price'])->where('service_id', $item->service->id);
                    }
                ]);
            }
        }
        return response()->json([
            'okay' => true,
            'item' => $item,
            'order' => $order,
            'statuses' => ['list' => OrderItem::STATUS, 'normal' => OrderItem::NORMAL_STATUS]
        ]);
    }
    public function tickets($order, $item_id)
    {
        $order = Order::select(['id', 'user_id'])->findOrFail($order);
        $this->authorize('view', $order);
        $item = $order->items()->select('id', 'order_id')->findOrFail($item_id);
        $tickets = $item->tickets()->limit(5)->latest()->get();
        return response()->json(compact('tickets'));
    }
}