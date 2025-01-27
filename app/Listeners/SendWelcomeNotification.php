<?php

namespace App\Listeners;

use App\Broadcasting\SMSChannel;
use App\Notifications\WelcomeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeNotification
{
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
        if ($event->user->level === 'new') {
            $notif = (new WelcomeNotification)->delay(['mail' => now()->addMinute(), SMSChannel::class => now()->addSeconds(10)]);
            $event->user->level = 'user';
            if ($event->user->save()) {
                $event->user->notify($notif);
            }
        }
    }
}
