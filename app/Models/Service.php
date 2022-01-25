<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'subtitle', 'slug', 'group', 'description', 'icon_class'];
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
