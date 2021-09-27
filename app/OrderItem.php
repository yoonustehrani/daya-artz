<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
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
}
