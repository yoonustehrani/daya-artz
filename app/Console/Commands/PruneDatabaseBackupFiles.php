<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PruneDatabaseBackupFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:prune';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prune database backup files';

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
        $database = config('database.connections.mysql.database');
        $filenames = "dbbackup-{$database}-" . now()->subDay()->format('Y-m-d') . '@*.sql.gz';
        $final_path = storage_path("app/backup/{$filenames}");
        exec("rm -f {$final_path}");
        return 0;
    }
}
