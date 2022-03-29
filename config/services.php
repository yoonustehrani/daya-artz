<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'reCAPTCHA' => [
        'site_key' => '6LfS1jMeAAAAAOFwhsVv7iJ1PPZFsR7E5wKUZtoe',
        'secret_key' => '6LfS1jMeAAAAAK0Qvotlp8zASMhyWMZ5A4EK7dTk'
    ],

    'rayganSMS' => [
        'url' => [
            'base' => 'http://smspanel.Trez.ir/',
            'otp' => 'SendMessageWithCode.ashx'
        ],
        'auth' => [
            'Username' => 'yoonustehrani',
            'Password' => 'uss828487'
        ]
    ],

    'farazSMS' => [
        'base_url' => 'https://rest.ippanel.com/v1/',
        'apikey' => 'wwCG0nQcdunKIsSZg5doljNKdIHIZkOFV-q60pg5KLo='
    ],
    
    'zarinpal' => [
        'merchant_id' => '354f67be-1d7e-4ae9-b095-0ed736208ec2',
        'sandbox' => false
    ],

    'sms' => ['active' => false]
];
