<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zeus\Models\ZeusModel;
use ZeusExtensions\SeoTool\Traits\HasSeoConfigured;

class Service extends ZeusModel
{
    public $timestamps = false;
    protected $fillable = ['title', 'subtitle', 'slug', 'group', 'description', 'icon_class'];
    public function parent()
    {
        return $this->belongsTo(Service::class, 'parent_id');
    }
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
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
    public function getUriAttribute()
    {
        return route('services.show', ['slug' => $this->slug]);
    }
}
