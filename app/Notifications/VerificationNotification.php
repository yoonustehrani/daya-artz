<?php

namespace App\Notifications;

use App\Mail\VerificationEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerificationNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $via;
    public $tries = 2;
    public $timeout = 90;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($via = ['mail'])
    {
        $this->via = $via;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return $this->via;
    }

    public function toMail($notifiable)
    {
        $verification_url = $notifiable->generateVerificationUrl();
        return (new VerificationEmail($notifiable, $verification_url));
    }

    public function toSms($notifiable)
    {
        $verification = $notifiable->generateVerificationCode('verify_phone', generate_code(), false, 2);
        $pattern = "xfi0x9hy0k";
        sms_driver()->sendPattern('+983000505', $notifiable->phone_number, $pattern, [
            'code' => (string) $verification->code
        ]);
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
            //
        ];
    }
}
