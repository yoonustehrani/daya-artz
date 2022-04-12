<?php

namespace App\Notifications;

use App\Broadcasting\SMSChannel;
use App\Mail\Welcome;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $tries = 2;
    public $timeout = 90;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return $notifiable->email ? ['mail', 'database'] : [SMSChannel::class, 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return new Welcome($notifiable);
    }

    /**
     * Send the Sms through SMS Service tool
     * 
     * @param App\Models\User $notifiable
     * @return void
     */
    public function toSms($notifiable)
    {
        sms_driver()->sendMessage(
            config('services.farazSMS.from_number'),
            $notifiable->phone_number,
            __('sms.welcome', ['name' => $notifiable->lastname ?: __('User')])
        );
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => __('Welcome to Daya Artz')
        ];
    }
}
