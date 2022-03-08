<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    const STATUS = [
        'submitted',
        'reviewed',
        'designing',
        'ready',
        'editing',
        'canceled',
        'suspended',
        'finished',
        'checked-out',
        // 'processing',
    ];
    const NORMAL_STATUS = [
        'submitted',
        'reviewed',
        'designing',
        'ready',
        'finished',
        'checked-out',
    ];
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function selected_plan()
    {
        return $this->belongsTo(ServicePlan::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
    public function getNormalAttribute()
    {
        return in_array($this->status, self::NORMAL_STATUS);
    }
    public function getStatusFaAttribute()
    {
        return __("userarea.orders.status.{$this->status}");
    }
    public function getCanceledAttribute()
    {
        return $this->status === 'canceled';
    }
    public function getOffAttribute()
    {
        if ($this->offer && $this->offer->value) {
            if ($this->offer->value_type === 'percentage') {
                $p = $this->offer->value > 100 ? 100 : $this->offer->value;
                return ($this->total / 100) * $p;
            }
            return $this->offer->value;
        }
        return 0;
    }
}
