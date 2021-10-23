<?php

namespace App\Notifications;

use App\Broadcasting\SMSChannel;
use App\Http\Utils\SMS;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerificationNotification extends Notification
{
    use Queueable;
    private $via;
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
        return (new MailMessage)
                    ->subject('تایید آدرس ایمیل')
                    ->line('برای تایید آدرس ایمیل خود روی دکمه زیر کلیک کنید')
                    ->action('تایید آدرس ایمیل', $verification_url)
                    ->line('اگر شما اکانتی در وب سایت ما نساخته اید ، این ایمیل را نادیده بگیرید.');
    }

    public function toSms($notifiable)
    {
        $verification = $notifiable->generateVerificationCode('verify_phone', generate_code(), false, 2);
        if (!! config('services.sms.active')) {
            \Log::critical("verification code is: {$verification->code}");
            (new SMS())->to($notifiable->phone_number)->sendAuth("کد احراز هویت : {$verification->code}");
        }
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
