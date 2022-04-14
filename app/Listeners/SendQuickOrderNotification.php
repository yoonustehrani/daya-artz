<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendQuickOrderNotification implements ShouldQueue
{
    use InteractsWithQueue;
    public $delay = 10;
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
        $pattern = "5i9e77eow9i1ubp";
        sms_driver()->sendPattern(config('services.farazSMS.from_number'), $event->data['phone_number'], $pattern, [
            'name' => $event->data['fullname'],
            'code' => $event->order->code
        ]);
    }
}
