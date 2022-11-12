<?php

namespace App\Traits;

use App\Models\Order;
use Illuminate\Http\Request;

trait TelegramBotFunctions {
    public function neworder(Request $request)
    {
        $main_services = get_list_of_services(null, null, ['id', 'title'])->map(fn($service) => $service->title)->toArray();
        $menu = array_chunk($main_services, 3);
        array_push($menu, [$this->functions['other_services']['text']]);
        array_push($menu, [$this->functions['backtomain']['text']]);
        $this->user->findOrCreateOrder();
        $this->send_message_to_user("مایل به سفارش کدام یک از خدمات ما هستید؟\nانتخاب کنید.", telegram_keyboard($menu));
    }
    public function back(Request $request)
    {
        if (preg_match('/^ordering\/service[0-9]{1,}$/', $this->user->current_state)) {
            $this->changeUserState('ordering');
            $this->neworder($request);
        }
    }
    public function show_main_menu()
    {
        $this->send_message_to_user('منوی اصلی', telegram_keyboard($this->menus['main']));
    }
    public function send_other_services()
    {
        $photo = 'https://dayaartz.com/storage/images/AGHmCckTJKVD0sVNfS0HAVvTyAHa5gluVv9LDrEy.jpg';
        $this->sendPhoto($this->chat_id, $photo, [
            'caption' => "ما هر نوع خدمات طراحی گرافیکی را برای شما انجام می دهیم.\n می توانید با کلیک روی دکمه زیر در میان انبوه خدمات ما جستجو کنید.",
            'reply_markup' => [
                'inline_keyboard' => [[
                    ['text' => 'جستجوی خدمات 🔍', 'switch_inline_query_current_chat' => '']
                ]]
            ]
        ]);
    }
    public function services(Request $request, $message_id = null)
    {
        $services = [
            [
                [ 'text' => 'طراحی لوگو', 'callback_data' => 'service-20'],
                [ 'text' => 'طراحی کارت ویزیت', 'callback_data' => 'service-21'],
                [ 'text' => 'سفارش طراحی سربرگ', 'callback_data' => 'service-31']
            ],
            [
                [ 'text' => 'طراحی کاتالوگ حرفه ای', 'callback_data' => 'service-32'],
                [ 'text' => 'سفارش طراحی ست اداری', 'callback_data' => 'service-33']
            ],
        ];
        $services = get_list_of_services(null, null, ['id', 'title'])->map(fn($service) => [
            'text' => $service->title,
            'callback_data' => "service-{$service->id}"
        ])->toArray();
        $keyboad = array_chunk($services, 2);
        array_push($keyboad, [
            ['text' => 'جستجوی خدمات 🔍', 'switch_inline_query_current_chat' => '']
        ]);
        $reply_markup = [
            'inline_keyboard' => $keyboad
        ];
        if ($message_id) {
            return $this->editMessageCaption($this->chat_id, $message_id, '', compact('reply_markup'));
        }
        $caption = "مایل به سفارش کدام یک از خدمات ما هستید؟ به آسانی انتخاب کنید \n[...و در صورتی که خدمات مورد نظر خود را یافت نکردید؛ تنها کافی است آن را در قسمت \"جستجو خدمات\" سرچ کنید...]\n⚠️ - با ثبت خدمات مورد نیازتان، کارشناسان ما تا نیاز شما برای اهداف کسب و کارتان را با شما بررسی خواهند کرد تا کم هزینه ترین و کارآمد ترین خدمات مورد استفاده شما واقع گردد.";
        $photo = 'https://dayaartz.com/storage/images/AGHmCckTJKVD0sVNfS0HAVvTyAHa5gluVv9LDrEy.jpg';
        return $this->sendPhoto($this->chat_id, $photo, compact('reply_markup', 'caption'));
    }
    public function website()
    {
        $html = view('telegram.website')->render();
        return $this->sendMessage($this->chat_id, $html, [
            'parse_mode' => 'HTML',
            'reply_markup' => [
                'inline_keyboard' => [
                    [[
                        'text' => '🔴 وبسایت دایا آرتز 🔴',
                        'url' => 'https://dayaartz.com?utm_source=telegram&utm_medium=bot&utm_campaign=link_from_bot_to_website'
                    ]]
                ]
            ]
        ]);
    }
    public function contact()
    {
        $html = view('telegram.contact')->render();
        $response = $this->sendMessage($this->chat_id, $html, [
            'reply_markup' => [
                'inline_keyboard' => [
                    [[
                        'text' => '🔴 وبسایت دایا آرتز 🔴',
                        'url' => 'https://dayaartz.com?utm_source=telegram&utm_medium=bot&utm_campaign=link_from_bot_to_website'
                    ]],
                    [[
                        'text' => '🔷 ادمین فروش در تلگرام 🔷',
                        'url' => 'https://t.me/dayasales'
                    ]],
                    [[
                        'text' => '✅ مشاوره و پشتیبانی واتس اپ ✅',
                        'url' => 'https://wa.me/989016045025'
                    ]]
                ]
            ],
            'disable_web_page_preview' => true
        ]);
        \Log::alert((array) $response);
        return $response;
    }
    public function orders()
    {
        $user = $this->user->user()->first();
        if (! $user) return;

        $orders = $user->orders()->select(['id', 'code', 'created_at'])->get();
        if ($orders->isEmpty()) {
            return $this->sendMessage($this->chat_id, 'سفارشی برای شما ثبت نشده است.');
        }
        $orders = $orders->map(function(Order $order) {
            $date = jdate($order->created_at)->format('%e %B %Y');
            $time = $order->created_at->format('H:i');
            return [
                "کد {$order->code} - تاریخ " . "📅 {$date}" . " - 🕙 {$time}"
            ];
        });
        // $keyboard = array_chunk();
        // array_push($keyboard, [
        //     ['برگشت']
        // ]);
        return $this->sendMessage($this->chat_id, 'لیست سفارشات', telegram_keyboard($orders->toArray()));
    }
}