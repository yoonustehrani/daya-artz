<?php

namespace App\Models;

use App\Traits\HasDetailsAttribute;
use App\Traits\HasUuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasUuidAsPrimaryKey, HasDetailsAttribute;
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
