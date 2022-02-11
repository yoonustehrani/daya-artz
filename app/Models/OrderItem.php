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
}
