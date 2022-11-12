<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasOfferAttribute;

class OrderItem extends Model
{
    use HasFactory, HasOfferAttribute;
    protected $fillable = ['service_id', 'title', 'status'];
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
    public function tickets()
    {
        return $this->morphMany(Ticket::class, 'ticketable');
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
}