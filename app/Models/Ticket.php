<?php

namespace App\Models;

use App\Traits\HasUuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, HasUuidAsPrimaryKey, SoftDeletes;

    const ALL_STATUS = ['open', 'on-hold', 'in-progress', 'awaiting-reply', 'reviewed', 'closed'];
    const ALLOWED_STATUSES = ['open', 'in-progress', 'awaiting-reply', 'reviewed'];

    protected $casts = [
        'closed_at' => 'datetime',
    ];
    protected $fillable = ['title', 'status'];
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
    public function ticketable()
    {
        return $this->morphTo();
    }
    public function files()
    {
        return $this->morphToMany(File::class, 'fileable');
    }
    public function department()
    {
        return $this->belongsTo(TicketDepartment::class, 'ticket_department_id');
    }
    public function messages()
    {
        return $this->hasMany(TicketMessage::class);
    }
    public function unread_messages()
    {
        return $this->messages()->unread();
    }
    public function getMessagingIsAllowedAttribute()
    {
        return in_array($this->getRawOriginal('status'), static::ALLOWED_STATUSES) && is_null($this->closed_at);
    }
    public function getUriAttribute()
    {
        return route('userarea', ['path' => '/tickets/' . $this->getKey()]);
    }
    public static function retriveAllStatus()
    {
        $to_return = [];
        foreach (self::ALL_STATUS as $status) {
            $to_return[$status] = __("userarea.tickets.status.{$status}");
        }
        return $to_return;
    }
}
