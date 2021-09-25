<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'service_attribute');
    }
    public function plans()
    {
        return $this->hasMany(ServicePlan::class);
    }
}
