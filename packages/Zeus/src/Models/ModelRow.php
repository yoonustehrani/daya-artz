<?php

namespace Zeus\Models;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Zeus\Traits\HasDetailsAttribute;
use Zeus\Traits\HasUuidAsPrimary;

class ModelRow extends BaseModel
{
    use HasDetailsAttribute, HasUuidAsPrimary;
    protected $table = self::TABLE_PREFIX . 'model_rows';
    // public $timestamps = false;
    // public $appends = ['rawdetails'];
    // protected $casts = ['details' => 'object'];
    // protected $hidden = ['rawdetails'];

    // protected function getRawdetailsAttribute()
    // {
    //     return $this->details ? json_encode($this->details, JSON_PRETTY_PRINT) : null;
    // }
    protected function setRawdetailsAttribute($details)
    {
        if (is_string($details)) {
            $details = json_decode($details);
        }
        $this->attributes['details'] = json_encode($details ?? []);
        $this->getDirty();
    }

    // public function getRequiredAttribute($required)
    // {
    //     return $required ?? 'off';
    // }

    public function modeltype()
    {
        return $this->belongsTo(ModelType::class, 'model_type_id');
    }

    public function relation()
    {
        return $this->belongsTo(ModelRelation::class, 'model_relation_id');
    }

    public function oneSideRelation()
    {
        return $this->relation()->whereIn('type', ['belongsTo', 'hasOne', 'morphOne']);
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function get_validation_rules($type = 'create')
    {
        $rules = [];
        switch ($this->type) {
            case 'text':
            case 'textarea':
            case 'richtext':
            case 'json':
                array_push($rules, 'string');
                break;
            case 'slug':
                array_push($rules, 'string','alpha_dash');
                break;
            case 'select':
                $choices = optional($this->details)->choices;
                if (is_array($choices)) {
                    array_push($rules, Rule::in($choices));
                }
                break;
            case 'date':
            case 'datetime':
                array_push($rules, 'digits_between:10,12');
                break;
            case 'number':
                array_push($rules, 'numeric');
                break;
            // case 'checkbox':
            //     // array_push($rules, 'accepted');
            //     break;
            case 'password':
                array_push($rules, 'string', 'confirmed', Password::min(8)->letters()->numbers());
                break;
            case 'multi-select':
                array_push($rules, 'array');
                break;
            case 'email':
                array_push($rules, 'email:rfc');
                break;
        }
        $required = $this->isRequiredFor($type);
        // if (isset($this->details->rules)) {
        //     $validation = optional($this->details->rules)->create;
        //     if (is_array($validation)) {
        //         if (in_array('required', $validation)) {
        //             $required = true;
        //         }
        //     }
        // }
        array_unshift($rules, $required ? 'required' : 'nullable');
        return $rules;
    }
    public function isRequiredFor($type)
    {
        return in_array($this->required, ['both', $type]);
    }
}