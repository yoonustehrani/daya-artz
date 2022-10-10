<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Zeus\Models\ZeusModel;

class Setting extends ZeusModel
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['key', 'value'];
    public static function booted()
    {
        static::saved(function($setting) {
            $cache_key = "site-settings.{$setting->key}";
            \Cache::forever($cache_key, $setting->value);
        });
    }
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = serialize($value);
    }

    public function getValueAttribute($value)
    {
        return unserialize($value);
    }
}
