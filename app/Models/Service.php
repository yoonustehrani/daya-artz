<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Zeus\Models\ZeusModel;

class Service extends ZeusModel
{
    public $timestamps = false;
    public $asText = 'title';
    protected $fillable = ['title', 'subtitle', 'slug', 'group', 'description', 'icon_class'];
    // self relationships
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    // other relationships
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function offers()
    {
        return $this->morphToMany(Offer::class, 'offerable')->where('expires_at', '>', now())->withPivot(['max_attempts', 'attempts']);
    }
    public function plans()
    {
        return $this->hasMany(ServicePlan::class);
    }
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
    /*
    public function form_fields()
    {
        return $this->attributes()->where('group', 'form-field');
    }
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'service_attribute');
    }
    public function add_ons()
    {
        return $this->attributes()->where('group', 'add-on');
    }
    */
    public function getUriAttribute()
    {
        return route('services.show', ['slug' => $this->slug]);
    }
}
