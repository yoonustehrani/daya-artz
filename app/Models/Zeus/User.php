<?php

namespace App\Models\Zeus;

use App\Broadcasting\SMSChannel;
use App\Notifications\VerificationNotification;
use Zeus\Models\ZeusModel;

// use App\Traits\VerificationAid;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

class User extends ZeusModel
{
    use SoftDeletes;
    public $asText = "fullname";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['fullname'];

    public function getFullnameAttribute()
    {
        if ($this->lastname) {
            return "{$this->firstname} {$this->lastname}";    
        }
        return $this->phone_number ?: $this->email;
    }
    public function offers()
    {
        return $this->belongsToMany(Offer::class)->withPivot(['user_attempts']);
        // return $this->morphToMany(Offer::class, 'offerable')->where('expires_at', '>', now())->withPivot(['max_attempts', 'attempts']);
    }
    public function company()
    {
        return $this->hasOne(Company::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
