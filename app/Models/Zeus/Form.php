<?php

namespace App\Models\Zeus;

use App\Traits\HasUuidAsPrimaryKey;
use Zeus\Models\ZeusModel;

class Form extends ZeusModel
{
    use HasUuidAsPrimaryKey;
    public $asText = 'title';
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
