<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Events\DiagnosingHealth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

class HealthCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'health:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Periodically check the status of your services and determine whether they are available.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Event::dispatch(new DiagnosingHealth);
        Log::info(defined('LARAVEL_START') ? __('Health check response in :ms ms.', ['ms' => round((microtime(true) - LARAVEL_START) * 1000)]) : __('The health check failed!'));
    }
}
