<?php

namespace App\Http\Controllers\Zeus;

use App\Http\Controllers\Controller;
use App\Models\FormAnswer;

class FormAnswerController extends Controller
{
    public function show($answer_id)
    {
        $answer = FormAnswer::with(['inputs' => function($q) {
            $q->select(['id', 'label', 'type']);
        }])->findOrFail($answer_id);
        $answer->inputs->append(['answer_value']);
        return view('custom.form-answer', compact('answer'));
    }
}