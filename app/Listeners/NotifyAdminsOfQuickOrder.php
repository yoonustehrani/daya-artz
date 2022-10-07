<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdminsOfQuickOrder implements ShouldQueue
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
            __('messages.quick-order.new-order', [
                'code' => $event->order->code,
                'phone_number' => $event->data['phone_number'],
                'fullname' => $event->data['fullname'],
                'datetime' => "📅 {$date} ⏰ {$time}"
            ])
        );
    }
}
