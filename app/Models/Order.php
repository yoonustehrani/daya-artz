<?php

namespace App\Models;

use App\Traits\HasDetailsAttribute;
use App\Traits\HasUuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, HasUuidAsPrimaryKey, HasDetailsAttribute, SoftDeletes;
    public static function booted()
    {
        static::creating(function($order) {
            $order->code = $order->tracking_code();
        });
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function getMethodAttribute($method)
    {
        return __("userarea.orders.method.{$method}");
    }
    public function getTextAttribute()
    {
        return "کد {$this->code} - {$this->method}";
    }
    private function tracking_code($length = 6)
    {
        $alpha = str_shuffle("ABCDEFGHJKLMNPQRSTUWXYZ");
        $code = $alpha[0];
        for ($i=0; $i < $length; $i++) { 
            $code .= random_int(0, 9);
        }
        return $code;
    }
}
