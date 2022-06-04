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

    public function getValidationRulesAttribute()
    {
        $validation_rules = collect([]);
        $this->inputs->filter(fn($i) => ! is_null($i->validation_rules) || $i->required)->each(function($input) use($validation_rules) {
            $rules = $input->validation_rules ? explode('|', $input->validation_rules) : [];
            if ($input->required) {
                array_unshift($rules, 'required');
            }
            if (count($rules)) {
                $validation_rules->put($input->name, $rules);
            }
        });
        return $validation_rules;
    }
}
