<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log; 

class DbBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Database Backup';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = "backup_" . strtotime(now()) . ".sql";
        $command = "C:\\xampp\\mysql\\bin\\mysqldump --user=" . env('DB_USERNAME') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . " > " . storage_path("app/backup/$filename");

        // Execute the command using shell_exec to capture any output or errors.
        $output = shell_exec($command);

        // You may also log the output for debugging purposes.
        Log::info("Database backup command output: $output");

        // Check if the backup was created successfully.
        if (file_exists(storage_path("app/backup/$filename"))) {
            $this->info("Database backup created successfully at storage/app/backup/$filename");
        } else {
            $this->error("Database backup failed.");
        }
    }

}
