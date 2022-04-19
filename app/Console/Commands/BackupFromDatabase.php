<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupFromDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Full backup from project database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        $username = config('database.connections.mysql.username', 'root');
        $host = config('database.connections.mysql.host', '127.0.0.1');
        $password = config('database.connections.mysql.password');
        $database = config('database.connections.mysql.database');
        $now = now();
        $filename = "dbbackup-{$database}-" . $now->format('Y-m-d') . '@' . $now->format('H:i:s') . '.sql.gz';
        $final_path = storage_path("app/backup/{$filename}");
        exec("mysqldump --user={$username} --password='{$password}' --host={$host} {$database} | gzip -9 > {$final_path}");
        return 0;
    }
}
