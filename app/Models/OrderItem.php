<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
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
        return true;
    }
    public function getStatusFaAttribute()
    {
        return __("userarea.orders.status.{$this->status}");
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
