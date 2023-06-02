<?php

namespace App\Console;

use App\Models\Pengajuan;
use App\Jobs\PembayaranJob;
use App\Models\Kartu_piutang;
use App\Models\Detail_Kartupiutang;
use App\Console\Commands\JatuhTempo;
use Illuminate\Foundation\Auth\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected $commands = [
        Commands\JatuhTempo::class,
    ];
    
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('users:jatuh-tempo')->twiceMonthly(20, '13:00');
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
