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
        $tgbot = new TelegramBot("5334104425:AAGrSGa6ysifA2ueez3LkgmjLFMmos9kebg");
        $dt = $this->datetime->format('Y-m-d H:i:s');
        $tgbot->sendMessage(-1001794637315, "💾 Mysql Backup: {$dt} 👇");
        
    }
}
