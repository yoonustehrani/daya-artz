<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use GuzzleHttp\Client;

class RecaptchaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->has('recaptch_token');
    }

    public function validate_captcha(string $action = null, int $score = 5)
    {
        try {
            $valid = false;
            $captcha_response = (new Client)->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret' => config('services.reCAPTCHA.secret_key'),
                    'response' => $this->input('recaptch_token'),
                    'remoteip' => $this->ip()
                ]
            ])->getBody()->getContents();
            $captcha_response = json_decode($captcha_response);
            \Log::alert((array) $captcha_response);
            if ($captcha_response->success) {
                $valid = ($captcha_response->score * 10 >= $score) && $captcha_response->action === $action;
            }
            return $valid;
        } catch (\Exception $err) {
            \Log::error('reCaptcha Error : ');
            \Log::critical($err);
            return false;
        }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
        ];
    }
}
