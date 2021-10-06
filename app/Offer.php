<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
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
}
