<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    public function scopeActive($builder)
    {
        return $builder->where('active', true);
    }
    public function scopeInactive($builder)
    {
        return $builder->where('active', false);
    }
    public function scopeExpired($builder)
    {
        $builder->whereNotNull('expires_at')->where('expires_at', '<', now());
    }
    public function scopeUnExpired($builder)
    {
        $builder->whereNull('expires_at')->orWhere('expires_at', '>=', now());
    }
    public function isPaid()
    {
        $paid = true;
        foreach ($this->bills as $bill) {
            $paid = ! is_null($bill->paid_at);
        }
        return $paid;
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    // public function invoiceable()
    // {
    //     return $this->morphTo();
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function children()
    {
        return $this->morphMany(Invoice::class, 'invoiceable');
    }
    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
