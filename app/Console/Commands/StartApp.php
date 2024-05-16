<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Starting the laravel application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        exec('npm run watch & npm run dev & php -S 127.0.0.1:1000 -t public/');
    }
}
