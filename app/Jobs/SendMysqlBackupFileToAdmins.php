<?php

namespace App\Jobs;

use App\Http\Utils\TelegramBot;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMysqlBackupFileToAdmins implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $filename;
    public $datetime;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $filename, $datetime)
    {
        $this->filename = $filename;
        $this->datetime = $datetime;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (! file_exists($this->filename)) {
            $this->fail(new Exception("File {$this->filename} does not exist"));
            return;
        }
        $tgbot = new TelegramBot(config('services.telegram_bots.server.token'));
        $dt = $this->datetime->format('Y-m-d H:i:s');
        $result = $tgbot->sendDocument(config('services.telegram_bots.server.channel_chat_id'), $this->filename, "💾 Mysql Backup: {$dt}");
        if (! optional($result)->ok) {
            $this->fail(new Exception("Telegram response was not okay"));
            return;
        }
    }
}
