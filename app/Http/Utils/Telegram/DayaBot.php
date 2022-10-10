<?php

namespace App\Http\Utils\Telegram;

use App\Http\Utils\TelegramBot;
use App\Models\Service;
use App\Traits\TelegramBotAid;
use App\Traits\TelegramBotFunctions;
use Illuminate\Http\Request;

class DayaBot extends TelegramBot
{
    use TelegramBotAid, TelegramBotFunctions;

    public $menus;
    public $functions;
    public $chat_id;
    public $user;

    public function __construct($bot_token)
    {
        parent::__construct($bot_token);
        $this->functions = collect([
            'neworder' => ['text' => 'سفارش طراحی گرافیک ➕', 'call' => 'neworder', 'state' => 'ordering'],
            'start' => ['text' => '/start', 'call' => 'show_main_menu', 'state' => 'main-menu'],
            'back' => ['text' => 'بازگشت به منوی اصلی', 'call' => 'show_main_menu', 'state' => 'main-menu'],
            'website' => ['text' => 'وب سایت دایا 🌐', 'call' => 'website', 'state' => 'main-menu'],
            'contact' => ['text' => 'تماس با ما 📞', 'call' => 'contact', 'state' => 'main-menu'],
            'services' => ['text' => 'خدمات دایا آرتز 🎨', 'call' => 'services', 'state' => 'services'],
            'other_services' => ['text' => 'دیگر خدمات', 'call' => 'send_other_services', 'state' => 'other_services']
        ]);
        $this->menus = collect([
            'main' => [
                [
                    ['text' =>  $this->functions['neworder']['text']],
                ],
                [
                    ['text' => $this->functions['services']['text']]
                ],
                [
                    ['text' => $this->functions['website']['text']],
                    ['text' => 'پیگیری سفارشات 🔖'],
                    ['text' => $this->functions['contact']['text']]
                ]
            ]
        ]);
    }

    public function handleInlineQuery(Request $request)
    {
        $this->chat_id = $request->input('inline_query.from.id');
        $inline_query_id = $request->input('inline_query.id');
        $query = $request->input('inline_query.query');
        $services = strlen($query) >= 2 ? get_list_of_services($query) : get_list_of_services();
        $results = $services->map(fn($service) => [
            'type' => 'article',
            'id' => "service-{$service->id}",
            // 'thumb_url' => 'https://dayaartz.com/storage/images/tn_nwQc8I0DYIt0DMeIqW5Njbgf16iuzZwkxgAYX3q5.jpg',
            'title' => $service->title,
            'description' => $service->subtitle ?? $service->short_description,
            'input_message_content' => [
                'message_text' => "/service_{$service->id}",
            ]
        ]);
        $this->bot->answerInlineQuery($inline_query_id, $results->toArray());
    }

    public function handleCallbackQuery(Request $request)
    {
        $clbq_id = $request->input('callback_query.id');
        $clbq_data = $request->input('callback_query.data');
        $this->chat_id = $request->input('callback_query.message.chat.id');
        $this->bot->answerCallbackQuery($clbq_id, '');
        if (preg_match('/^service-[0-9]{1,}$/', $clbq_data)) {
            $service = Service::select(['title', 'subtitle', 'id'])->find(str_replace('service-', '', $clbq_data));
            if ($service) {
                $this->send_message_to_user("{$service->title}\n\n{$service->subtitle}");
            }
        }
    }

    public function handleRawMessage(Request $request)
    {
        $this->chat_id = $request->input('message.chat.id');
        if ($func = $this->functions->firstWhere('text', $request->input('message.text'))) {
            $this->user = $this->findOrCreateUser($request, $func['state']);
            $this->{$func['call']}($request);
        } else {
            $this->send_message_to_user('could not be found');
        }
    }

    public function processRequest(Request $request)
    {
        // \Log::info("handling telegram request for {$this->chat_id}");
        \Log::alert($request->all());
        if ($request->has('message')) {
            return $this->handleRawMessage($request);
        }
        if ($request->has('inline_query') && $request->input('inline_query.chat_type') === 'sender') {
            return $this->handleInlineQuery($request);
        }
        if($request->has('callback_query')) {
            return $this->handleCallbackQuery($request);
        }
    }
}