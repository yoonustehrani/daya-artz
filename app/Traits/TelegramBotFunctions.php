<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait TelegramBotFunctions {
    public function neworder(Request $request)
    {
        $this->send_message_to_user('You are ' . $this->user->fullname);
        $main_services = get_list_of_services(null, null, ['id', 'title'])->map(fn($service) => $service->title)->toArray();
        $menu = array_chunk($main_services, 3);
        array_push($menu, [$this->functions['back']['text']]);
        $this->send_message_to_user("مایل به سفارش کدام یک از خدمات ما هستید؟\nانتخاب کنید.", telegram_keyboard($menu));
    }
    public function show_main_menu()
    {
        $this->send_message_to_user('به دایا آرتز خوش آمدید', telegram_keyboard($this->menus['main']));
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
    public function services()
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
        $photo = 'https://dayaartz.com/storage/images/AGHmCckTJKVD0sVNfS0HAVvTyAHa5gluVv9LDrEy.jpg';
        $this->sendPhoto($this->chat_id, $photo, [
            'reply_markup' => [
                'inline_keyboard' => $keyboad
            ]
        ]);
    }
    public function website()
    {
        $this->send_message_to_user('https://dayaartz.com');
    }
    public function contact()
    {
        $this->send_message_to_user("☎️ 021-28423542\n📞 09015045025\n📞 09016045025");
    }
}