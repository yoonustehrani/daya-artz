<?php

namespace App\Models;

use App\Broadcasting\SMSChannel;
use App\Notifications\VerificationNotification;
use App\Traits\VerificationAid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, VerificationAid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'phone_number'
    ];

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

    public function verification_codes()
    {
        return $this->hasMany(VerificationCode::class)->where('expires_at', '>', now());
    }

    public function sms_verification_codes()
    {
        return $this->verification_codes()->where('sent_by','sms');
    }

    public function email_verification_codes()
    {
        return $this->verification_codes()->where('sent_by','sms');
    }

    public function offers()
    {
        return $this->morphToMany(Offer::class, 'offerable')->where('expires_at', '>', now())->withPivot(['max_attempts', 'attempts']);
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
    // public function available_offers()
    // {
    //     return $this->offers()->wherePivot('');
    // }
    /**
     * Model Scopes
    */

    public function scopeNormalUser($builder)
    {
        return $builder->where('score', 0);
    }

    public function scopeCustomer($builder)
    {
        return $builder->where('score', 1);
    }

    public function scopeSpecialCustomer($builder)
    {
        return $builder->where('score', 2);
    }

    public function resendEmail()
    {
        $this->notify(new VerificationNotification(['mail']));
    }
    public function resendSms()
    {
        $this->notify(new VerificationNotification([SMSChannel::class]));
    }
}
