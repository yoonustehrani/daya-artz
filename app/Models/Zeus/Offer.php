<?php

namespace App\Models\Zeus;

use App\Traits\HasDetailsAttribute;
use Zeus\Models\ZeusModel;

class Offer extends ZeusModel
{
    use HasDetailsAttribute;
    public function services()
    {
        return $this->morphedByMany(Service::class, 'offerable');
    }
    public function users()
    {
        return $this->morphedByMany(User::class, 'offerable');
    }

    public function attempt()
    {
        
    }

    public function getDetailsAttribute($details)
    {
        return json_decode($details);
    }
    public function setDetailsAttribute($json_string)
    {
        $this->attributes['details'] = json_encode(json_decode($json_string));
    }

    // public function scopeUnexpired($builder)
    // {
    //     $builder->whereNull('expires_at')->orWhere('expires_at', '>', now());
    // }
}
