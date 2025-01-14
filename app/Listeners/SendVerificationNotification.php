<?php

namespace App\Listeners;

use App\Broadcasting\SMSChannel;
use App\Notifications\VerificationNotification;
use App\Notifications\VerifyPhone;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
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
        if ($event->user->email && ! $event->user->email_verified_at) {
            $event->user->notify(new VerificationNotification(['mail']));
        } else if ($event->user->phone_number && ! $event->user->phone_verified) {
            $event->user->notify(new VerificationNotification([SMSChannel::class]));
        }
    }
}
