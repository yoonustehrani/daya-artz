<?php

namespace App\Listeners;

use App\Events\FormAnswered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendFormAnsweredNotification implements ShouldQueue
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
    public function handle(FormAnswered $event)
    {
        $form = $event->answer->form()->select(['id', 'title'])->first();
        $date = jdate($event->answer->created_at)->format('%e %B %Y');
        $time = $event->answer->created_at->format('H:i:s');
        $data = [
            'title' => $form->title,
            'name' => $event->answer->name,
            'datetime' => "📅 {$date} ⏰ {$time}",
            'ip' => $event->answer->ip
        ];
        telegram_notifier_bot()->sendMessage(
            config('services.telegram_bots.notifier.channel_chat_id'),
            __('messages.form.answer-created', $data),
            [
                'reply_markup' => [
                    'inline_keyboard' => [[
                        [ 'text' => 'مشاهده', 'url' => route('zeus.form-answers.show', ['id' => $event->answer->id])]
                    ]]
                ]
            ]
        );
    }
}