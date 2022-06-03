<?php

namespace App\Models;

use App\Traits\HasUuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory, HasUuidAsPrimaryKey;

    public function answers()
    {
        return $this->hasMany(FormAnswer::class);
    }

    public function inputs()
    {
        return $this->hasMany(FormInput::class);
    }

    public function scopeActive($builder)
    {
        $builder->where('enabled', true);
    }
}
