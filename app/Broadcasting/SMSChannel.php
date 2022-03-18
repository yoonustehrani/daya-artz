<?php

namespace App\Broadcasting;

use App\User;
use Illuminate\Notifications\Notification;

class SMSChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function send($notifiable, Notification $notification)
    {
        if (method_exists($notification, 'toSMS')) {
            $notification->toSMS($notifiable);
        }
    }
}
