<?php

namespace App\Models;

use App\Traits\HasUuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory, HasUuidAsPrimaryKey;

    const ALLOWED_STATUSES = ['open', 'in-progress', 'awaiting-reply', 'reviewd'];

    protected $casts = [
        'closed_at' => 'datetime',
    ];
    public $appends = ['messaging_is_allowed'];

    public static function booted()
    {
        static::creating(function($tiket) {
            $tiket->tracking_code = $tiket->tracking_code();
        });
    }
    private function tracking_code($length = 6)
    {
        $alpha = str_shuffle("ABCDEFGHJKLMNPQRSTUWXYZ");
        $code = $alpha[0];
        for ($i=0; $i < $length; $i++) { 
            $code .= random_int(1, 9);
        }
        return $code;
    }
    public function getStatusAttribute($status)
    {
        return __("userarea.tickets.status.{$status}");
    }
    public function department()
    {
        return $this->belongsTo(TicketDepartment::class, 'ticket_department_id');
    }
    public function messages()
    {
        return $this->hasMany(TicketMessage::class);
    }
    public function getMessagingIsAllowedAttribute()
    {
        return in_array($this->getRawOriginal('status'), static::ALLOWED_STATUSES) && is_null($this->closed_at);
    }
}
