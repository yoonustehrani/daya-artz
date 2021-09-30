<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
