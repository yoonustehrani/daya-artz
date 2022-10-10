<?php

namespace App\Models;

use App\Traits\HasDetailsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormInput extends Model
{
    use HasFactory, HasDetailsAttribute;

    protected $hidden = ['validation_rules', 'pivot'];
    public $timestamps = false;

    public function answers()
    {
        return $this->belongsToMany(FormAnswer::class);
    }

    public function getAnswerValueAttribute()
    {
        return unserialize($this->pivot->value);
    }
}
