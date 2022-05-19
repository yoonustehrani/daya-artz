<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
    use HasFactory;

    protected $fillable = ['side', 'body', 'user_id'];

    public function scopeUnread($builder)
    {
        $builder->whereNull('read_at');
    }

    public function files()
    {
        return $this->morphToMany(File::class, 'fileable');
    }
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
