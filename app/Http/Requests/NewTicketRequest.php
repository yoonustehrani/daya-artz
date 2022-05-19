<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewTicketRequest extends FormRequest
{
    public $max_upload_size = 12.0 * 1024;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:60',
            'ticket_content' => 'required|min:10|max:2000',
            'department' => 'required|numeric|min:1',
            'files.*' => [
                'file',
                'image',
                'mimes:jpg,jpeg,png'
            ],
            'files' => [
                function($attribute, $value, $fail) {
                    $sizes = array_map(fn($file) => round($file->getSize() / 1000, 2), $value);
                    $sum_of_size = array_sum($sizes);
                    if ($sum_of_size > $this->max_upload_size) {
                        $fail(
                            __('validation.max.file', [
                                'attribute' => __('validation.attributes.' . $attribute),
                                'max' => (int) $this->max_upload_size
                            ])
                        );
                    }
                }
            ]
        ];
    }

    public function attributes()
    {
        $attributes = [];

        $files = $this->file('files') ?: [];
        if (count($files)) {
            foreach ($files as $index => $file) {
                $attributes["files.{$index}"] = $file->getClientOriginalName();
            }
        }

        return $attributes;
    }
}
