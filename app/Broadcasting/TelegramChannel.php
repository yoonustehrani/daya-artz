<?php

namespace App\Broadcasting;

use App\User;
use Illuminate\Notifications\Notification;

class TelegramChannel
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
        if (method_exists($notification, 'toTelegram')) {
            $notification->toTelegram($notifiable);
        }
    }
}
