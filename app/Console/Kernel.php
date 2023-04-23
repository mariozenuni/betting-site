<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */

     protected $commands =[
        Commands\UpdateBettableGameTable::class,
        Commands\UpdateEndedGameTable::class
     ];
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('tableBettableGame:cron')->everyThirtyMinutes();
        // $schedule->command('tableEndedGame:cron')->everyTwoHours();
        
        //just for testing pupuses; php artisan schedule:run  
        $schedule->command('tableBettableGame:cron')->everyMinute();
        $schedule->command('tableEndedGame:cron')->everyMinute();

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
