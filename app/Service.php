<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'service_attribute');
    }
    public function form_fields()
    {
        return $this->attributes()->where('group', 'form-field');
    }
    public function add_ons()
    {
        return $this->attributes()->where('group', 'add-on');
    }
    public function plans()
    {
        return $this->hasMany(ServicePlan::class);
    }
    public function offers()
    {
        return $this->morphToMany(Offer::class, 'offerable')->where('expires_at', '>', now())->withPivot(['max_attempts', 'attempts']);
    }
}