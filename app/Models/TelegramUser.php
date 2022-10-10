<?php

namespace App\Models;

use App\Traits\HasDetailsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramUser extends Model
{
    use HasFactory, HasDetailsAttribute;

    protected $primaryKey = 'chat_id';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}