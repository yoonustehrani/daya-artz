<?php

namespace App\Models;

use App\Traits\HasDetailsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class TelegramUser extends Model
{
    use HasFactory, HasDetailsAttribute;

    protected $primaryKey = 'chat_id';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function getCacheKey()
    {
        return "telegram-users.{$this->chat_id}.order";
    }

    /**
     * @return \App\Models\Order
     */
    public function findOrCreateOrder()
    {
        return Cache::remember($this->getCacheKey(), 60 * 60, function () {
            $order = new Order();
            $order->type = 'automate';
            $order->method = 'telegram-bot';
            $order->status = __('userarea.orders.status.submitted');
            // $order->status_info = '';
            return $order;
        });
    }

    public function removeOrder()
    {
        return Cache::forget($this->getCacheKey()) && Cache::forget($this->getCacheKey() . '.items');
    }

    public function getOrderItems()
    {
        return Cache::get($this->getCacheKey() . '.items', collect([]));
    }

    public function addItemToOrder(Service $service)
    {
        $current_items = $this->getOrderItems();

        if ($current_items->firstWhere('service_id', $service->id)) return false;
        $current_items->push(new OrderItem([
            'service_id' => $service->id,
            'title' => $service->title,
            'status' => OrderItem::STATUS[0]
        ]));

        return Cache::put($this->getCacheKey() . '.items', $current_items);
    }

    public function removeItemFromOrder($service_id)
    {
        $current_items = $this->getOrderItems();

        if (! $current_items->firstWhere('service_id', $service_id)) return false;

        $current_items = $current_items->filter(fn(OrderItem $orderItem) => $orderItem->service_id != $service_id);

        return Cache::put($this->getCacheKey() . '.items', $current_items);
    }
}