<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendVerificationNotification
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
        \Log::alert("event listener handle method for user#{$event->user->id}");
        if ($event->user->email && ! $event->user->email_verified_at) {
            # send desired notification
            \Log::info("user should verify by email");
        } else if ($event->user->phone_number && ! $event->user->phone_verified) {
            # send desired notification
            \Log::info("user should verify by sms");
        }
    }
}
