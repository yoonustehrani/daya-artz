<?php

namespace App\Http\Utils\Telegram;

use App\Events\TelegramBotOrderRecieved;
use App\Http\Utils\TelegramBot;
use App\Models\Service;
use App\Models\TelegramUser;
use App\Models\User;
use App\Traits\TelegramBotAid;
use App\Traits\TelegramBotFunctions;
use Illuminate\Http\Request;

class DayaBot extends TelegramBot
{
    use TelegramBotAid, TelegramBotFunctions;

    public $menus;
    public $functions;
    public $commands;
    public $chat_id;

    public function __construct($bot_token)
    {
        parent::__construct($bot_token);
        $this->commands = [
            '/start' => ['call' => 'show_main_menu', 'state' => 'main-menu'],
            '/services' => ['call' => 'services', 'state' => 'services'],
            '/neworder' => ['call' => 'neworder', 'state' => 'ordering'],
            '/orders' => ['call' => 'orders', 'state' => 'list_of_orders']
        ];
        $this->functions = collect([
            'neworder' => ['text' => 'سفارش طراحی گرافیک ➕', 'call' => 'neworder', 'state' => 'ordering'],
            'backtomain' => ['text' => 'بازگشت به منوی اصلی', 'call' => 'show_main_menu', 'state' => 'main-menu'],
            'website' => ['text' => 'وب سایت دایا 🌐', 'call' => 'website', 'state' => 'main-menu'],
            'contact' => ['text' => 'تماس با ما 📞', 'call' => 'contact', 'state' => 'main-menu'],
            'services' => ['text' => 'خدمات دایا آرتز 🎨', 'call' => 'services', 'state' => 'services'],
            'other_services' => ['text' => 'دیگر خدمات', 'call' => 'send_other_services', 'state' => 'other_services'],
            'back' => ['text' => 'بازگشت', 'call' => 'back', 'state' => false]
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

    public function addOrderItem(Service $service)
    {
        $this->send_message_to_user("در حال بررسی");
        if ($this->user->addItemToOrder($service)) {
            $this->send_message_to_user("{$service->title} به سفارش شما افزوده شد.");
        } else {
            $this->send_message_to_user('آیتم انتخابی در لیست سفارش شما موجود است.');
        }
        $text = 'سفارش شما در حال حاضر شامل موارد زیر می باشد.';
        $order = $this->user->findOrCreateOrder();
        $items = $this->user->getOrderItems()->map(fn($orderItem) => [
            'text' => "{$orderItem->title} ❌",
            'callback_data' => 'delete-order-item-' . $orderItem->service_id
        ]);
        foreach ($order->items as $item) {
            $text .= "\n- {$item->title}";
        }
        $inline_keyboard = array_chunk($items->toArray(), 2);
        array_push($inline_keyboard, [
            ['text' => 'نهایی کردن سفارش', 'callback_data' => 'checkout']
        ]);
        return $this->sendMessage($this->chat_id, $text, [
            'reply_markup' => compact('inline_keyboard')
        ]);
    }

    public function createWebsiteUser($phone_number, $verified_phone = false)
    {
        $user = new User();
        // $full_name_array = explode(' ', $fullname);
        $user->password = bcrypt('@DAYAARTZ');
        $user->phone_number = $phone_number;
        $user->lastname = $this->user->details->user->fullname;
        $user->level = 'user';
        $user->phone_verified = $verified_phone;
        // $user->details = [];
        $user->save();
        $this->user->user()->associate($user);
        return $this->user->save();
    }

    public function handleInlineQuery(Request $request)
    {
        $this->chat_id = $request->input('inline_query.from.id');
        $inline_query_id = $request->input('inline_query.id');
        $query = $request->input('inline_query.query');
        $services = strlen($query) >= 2 ? get_list_of_services($query) : get_list_of_services();
        $images = collect([
            'https://dayaartz.com/storage/images/C9yCkHar2aa04fJNf31PjQFmf4kJeQGcJhLZiLui.jpg',
            'https://dayaartz.com/storage/images/gkr7mgiCVaK3Q7RGr3DGI9o12TUDvZTDb67hr3pI.jpg',
            'https://dayaartz.com/storage/images/x57r6JM0oTn7P3A708oh58sqeuP8kI99z5ObggY7.jpg'
        ]);
        $results = $services->map(fn($service) => [
            'type' => 'article',
            'id' => "service-{$service->id}",
            'thumb_url' => $images->random(),
            'title' => $service->title,
            'description' => $service->subtitle ?? $service->short_description,
            'input_message_content' => [
                'message_text' => "/service_{$service->id}",
            ]
        ]);
        $this->answerInlineQuery($inline_query_id, $results->toArray());
    }

    public function handleCallbackQuery(Request $request)
    {
        $clbq_id = $request->input('callback_query.id');
        $clbq_data = $request->input('callback_query.data');
        $this->chat_id = $request->input('callback_query.message.chat.id');
        $this->user = $this->findOrCreateUser($request);
        if ($clbq_data === 'checkout') {
            if (! $this->user->user()->exists() && ! str_starts_with($this->user->current_state, 'checkout/')) {
                $this->changeUserState('checkout/fullname');
                $this->sendMessage($this->chat_id, 'لطفا نام و نام خانوادگی خود را وارد نمایید.', [
                    'reply_markup' => [
                        'remove_keyboard' => true
                    ]
                ]);
            } else {
                $this->changeUserState('checkout/details');
                $this->sendMessage($this->chat_id, "لطفا اگر توضیحات اضافه ای دارید در ادامه این پیام ذکر کنید.", [
                    'reply_markup' => [
                        'keyboard' => [
                            ['توضیحی ندارم']
                        ],
                        'resize_keyboard' => true
                    ]
                ]);
            }
            return $this->quickAnswerCallbackQuery($clbq_id);
        }
        if ($clbq_data === 'services') {
            $message_id = $request->input('callback_query.message.message_id');
            return $this->{$this->functions['services']['call']}($request, $message_id);
        }
        // User clicked on a service inline button
        if (preg_match('/^service\-[0-9]{1,}$/', $clbq_data)) {
            $back_text = 'بازگشت ↪️';
            $service = Service::select(['title', 'parent_id', 'subtitle', 'id'])->find(str_replace('service-', '', $clbq_data));
            if (! $service) return;
            $message_id = $request->input('callback_query.message.message_id');
            $service->load('children');
            // status -> 'viewing/service' . $service->id
            $keys = array_chunk(
                $service->children->map(fn($service) => [
                    'text' => $service->title, 'callback_data' => "service-{$service->id}"
                    ]
                )->toArray(), 2
            );
            array_push($keys, [
                ['text' => $back_text, 'callback_data' => 'services']
            ]);
            $this->quickAnswerCallbackQuery($clbq_id);
            if ($service->children->count()) {
                return $this->editMessageCaption($this->chat_id, $message_id, "{$service->title}\n\n{$service->subtitle}", [
                    'reply_markup' => [
                        'inline_keyboard' => $keys
                    ]
                ]);
            }
            return $this->editMessageCaption($this->chat_id, $message_id, "{$service->title}\n\n{$service->subtitle}", [
                'reply_markup' => [
                    'inline_keyboard' => [
                        [['text' => '🟢 سفارش این آیتم 🟢', 'callback_data' => "order-service-{$service->id}"]],
                        [['text' => $back_text, 'callback_data' => $service->parent_id ? "service-{$service->parent_id}" : "services"]]
                    ]
                ]
            ]);
        }
        if (preg_match('/^order\-service\-[0-9]{1,}$/', $clbq_data)) {
            $service_id = str_replace('order-service-', '', $clbq_data);
            $service = Service::select(['title', 'id'])->find($service_id);
            $this->quickAnswerCallbackQuery($clbq_id);
            if (! $service) return;
            $this->addOrderItem($service);
        }
        // User clicked an orderitem to be removed
        if (preg_match('/^delete\-order\-item\-[0-9]{1,}$/', $clbq_data)) {
            $message_id = $request->input('callback_query.message.message_id');
            $matches = null;
            if (preg_match('/[0-9]{1,}/', $clbq_data, $matches)) {
                $service_id = (int) $matches[0];
                $this->user->removeItemFromOrder($service_id);
                $order = $this->user->findOrCreateOrder();
                $order_items = $this->user->getOrderItems();
                if ($order_items->isNotEmpty()) {
                    $items = $order_items->map(fn($orderItem) => [
                        'text' => "{$orderItem->title} ❌",
                        'callback_data' => 'delete-order-item-' . $orderItem->service_id
                    ]);
                    $inline_keyboard = array_chunk($items->toArray(), 2);
                    array_push($inline_keyboard, [
                        ['text' => 'نهایی کردن سفارش', 'callback_data' => 'checkout']
                    ]);
                    $this->editMessageReplyMarkup($this->chat_id, $message_id, compact('inline_keyboard'));
                } else {
                    $this->editMessageText($this->chat_id, $message_id, 'سفارش شما شامل هیچ آیتمی نمی باشد.', [
                        'reply_markup' => ['inline_keyboard' => [[]]]
                    ]);
                }
            }
            return $this->quickAnswerCallbackQuery($clbq_id);
        }
    }

    public function handleRawMessage(Request $request)
    {
        $this->chat_id = $request->input('message.chat.id');
        $message_text = $request->input('message.text');

        if ($request->input('message.entities.0.type') === 'bot_command') {
            return $this->handleBotCommands($message_text, $request);
        }

        $this->user = $this->findOrCreateUser($request);
        if (str_starts_with($this->user->current_state, 'checkout/')) {
            switch ($this->user->current_state) {
                case 'checkout/fullname':
                    $this->user->details = ['user' => ['fullname' => $message_text]];
                    $this->user->current_state = 'checkout/phone_number';
                    if ($this->user->save()) {
                        $this->sendMessage($this->chat_id, "لطفا شماره تماس خود را وارد نمایید.", [
                            'reply_markup' => [
                                'keyboard' => [
                                    [
                                        [
                                            'text' => 'به اشتراک گذاری شماره تلفن من',
                                            'request_contact' => true
                                        ]
                                    ]
                                ],
                                'resize_keyboard' => true
                            ]
                        ]);
                    }
                    break;
                case 'checkout/phone_number':
                    $phone_number = $request->has('message.contact') ? $request->input('message.contact.phone_number') : $message_text;
                    $this->createWebsiteUser($phone_number, $request->has('message.contact'));
                    // rolling to next state
                    $this->sendMessage($this->chat_id, "لطفا اگر توضیحات اضافه ای دارید در ادامه این پیام ذکر کنید.", [
                        'reply_markup' => [
                            'keyboard' => [
                                ['توضیحی ندارم']
                            ],
                            'resize_keyboard' => true
                        ]
                    ]);
                    $this->changeUserState('checkout/details');
                    break;
                case 'checkout/details':
                    $order = $this->user->findOrCreateOrder();
                    $order->description = $message_text === 'توضیحی ندارم' ? '---' : $message_text;
                    $order->details = [];
                    try {
                        \DB::beginTransaction();
                        $website_user = $this->user->user()->first();
                        $website_user->orders()->save($order);
                        $order->items()->saveMany($this->user->getOrderItems());
                        \DB::commit();
                        $this->user->removeOrder();
                        $this->changeUserState('main-menu');
                        $this->send_message_to_user(__('messages.order.recived', ['code' => $order->code]), [
                            'reply_markup' => [
                                'remove_keyboard' => true
                            ]
                        ]);
                        $this->show_main_menu();
                        event(new TelegramBotOrderRecieved($order, $website_user));
                    } catch (\Throwable $th) {
                        \DB::rollback();
                        \Log::error($th);
                        $this->send_message_to_user('مشکلی حین ثبت سفارش پیش آمد دوباره تلاش کنید.');
                    }
                    break;
            }
            return;
        }

        if ($func = $this->functions->firstWhere('text', $message_text)) {
            $this->user = $this->findOrCreateUser($request, $func['state']);
            return $this->{$func['call']}($request);
        }

        if ($message_text) {
            $service = Service::select(['title', 'id'])->whereTitle($message_text)->first();
            if ($service) {
                $service->load('children');
                $this->user = $this->findOrCreateUser($request, 'ordering/service' . $service->id);
                if ($service->children->count()) {
                    // Selected Service has children
                    $children = $service->children->map(fn($service) => $service->title)->toArray();
                    $keys = array_chunk($children, 2);
                    array_push($keys, [$this->functions['backtomain']['text'], $this->functions['back']['text']]);
                    $details = telegram_keyboard($keys);
                    return $this->send_message_to_user("{$service->title}", $details);
                }
                // adding selected Service to current order
                return $this->addOrderItem($service);
            }
        }
        
        return $this->send_message_to_user('unknown command');
    }

    public function processRequest(Request $request)
    {
        // \Log::info("handling telegram request for {$this->chat_id}");
        // \Log::alert($request->all());
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