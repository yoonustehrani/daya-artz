<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewOrderNotificationToAdmins implements ShouldQueue
{
    public $delay = 120;
    public $tries = 3;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $date = jdate($event->order->created_at)->format('%e %B %Y');
        $time = $event->order->created_at->format('H:i:s');
        telegram_notifier_bot()->sendMessage(
            config('services.telegram_bots.notifier.channel_chat_id'),
            __('messages.orders.new', [
                'code' => $event->order->code,
                'phone_number' => $event->user->phone_number,
                'fullname' => $event->user->firstname . " " .  $event->user->lastname,
                'datetime' => "📅 {$date} ⏰ {$time}",
                'type' => $event->order->method
            ])
        );
    }
}
