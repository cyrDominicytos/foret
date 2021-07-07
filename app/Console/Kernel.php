<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // PROGRAMMER LE CRONTAB DANS CPANEL ET APPELER TOUTES LES MN: php artisan schedule:run
        
        //https://laracasts.com/discuss/channels/laravel/free-queue-solution-for-shared-hosting
        //https://laracasts.com/discuss/channels/laravel/laravel-55-queue-solution-with-shared-hosting
        $schedule->command('queue:work --tries=3 --daemon')->everyMinute()->withoutOverlapping();
        
        $schedule->command('backup:clean')->daily()->at('04:00');
        $schedule->command('backup:run --only-db')->daily()->at('05:00');
        
        //ajouter d'autres commandes ici
        
        //https://stackoverflow.com/questions/43354331/when-using-laravel-queue-job-processing-getting-stuck
        $schedule->command('queue:restart')->everyThirtyMinutes();
      
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
