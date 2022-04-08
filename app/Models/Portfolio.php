<?php

namespace App\Models;

use App\Traits\HasDetailsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Zeus\Models\ZeusModel;

class Portfolio extends ZeusModel
{
    use HasFactory, HasDetailsAttribute;

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    // public function image()
    // {
    //     return $this->morphOne(Image::class, 'imageable')->latest();
    // }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    protected function setTabularDetailsAttribute($details)
    {
        if (is_string($details)) {
            $details = json_decode($details);
        }
        $this->attributes['tabular_details'] = json_encode($details ?? []);
    }
    protected function getTabularDetailsAttribute($details)
    {
        return json_decode($details);
    }
    protected function setTimelineAttribute($details)
    {
        if (is_string($details)) {
            $details = json_decode($details);
        }
        $this->attributes['timeline'] = json_encode($details ?? []);
    }
    protected function getTimelineAttribute($details)
    {
        return json_decode($details);
    }
}
