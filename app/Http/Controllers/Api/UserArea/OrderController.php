<?php

namespace App\Http\Controllers\Api\UserArea;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;

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
    public function item($order, $item_id)
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
}