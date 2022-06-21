<?php

namespace App\Models\Zeus;

use Zeus\Models\ZeusModel;

class FormAnswer extends ZeusModel
{
    protected $fillable = ['user_id', 'ip', 'name'];
    public function form()
    {
        return $this->belongsTo(Form::class);
    }
    public function inputs()
    {
        return $this->belongsToMany(FormInput::class, 'form_input_answers', 'answer_id', 'input_id')->withPivot('value');
    }
}
