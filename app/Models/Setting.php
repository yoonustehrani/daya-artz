<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['key', 'value'];

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = serialize($value);
    }

    public function getValueAttribute($value)
    {
        return unserialize($value);
    }
}
