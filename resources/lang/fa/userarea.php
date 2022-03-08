<?php

return [
    'tickets' => [
        'status' => [
            'open' => 'باز',
            'on-hold' => 'موقتا در حال انتظار',
            'in-progress' => 'در حال انجام',
            'awaiting-reply' => 'منتظر پاسخ شما',
            'reviewd' => 'توسط تیم پشتیبانی مشاهده شده',
            'closed' => 'بسته شده'
        ]
    ],
    'orders' => [
        'method' => [
            'quick-order' => 'سفارش سریع',
            'professional' => 'سفارش تخصصی',
            'tele-order' => 'سفارش تلفنی',
            'telegram-bot' => 'سفارش با ربات تلگرامی',
            'messanger' => 'سفارش از پیامرسان ها'
        ],
        'type' => [
            'manual' => 'دستی',
            'automate' => 'سیستمی'
        ],
        'status' => [
            'submitted' => 'ثبت شده',
            'reviewd' => 'دریافت و بررسی شده',
            'designing' => 'در حال طراحی',
            'finished' => 'پایان یافته',
            'checked-out' => 'تسویه شده',
            // 'processing' => 'پردازش اطلاعات',
            'editing' => 'در حال ویرایش',
            'canceled' => 'کنسل شده',
            'suspended' => 'معلق',
            'ready' => 'آماده ارایه'
        ]
    ],
    'transactions' => [
        'provider' => [
            'zarinpal' => 'درگاه زرین پال',
            'direct' => 'واریز به حساب'
        ],
        'status' => [
            'verified' => 'تایید شده',
            'approved' => 'انجام شده',
            'canceled' => 'کنسل شده',
            'pending' => 'در انتظار'
        ]
    ],
    'bills' => [
        'deposit' => 'پیش پرداخت :item_title',
        'checkout' => 'تسویه :item_title'
    ]
];