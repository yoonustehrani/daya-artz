<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAnswer extends Model
{
    use HasFactory;
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
