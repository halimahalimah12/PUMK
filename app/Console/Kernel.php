<?php

namespace App\Console;

use App\Models\Detail_Kartupiutang;
use App\Jobs\PembayaranJob;
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
        $pengajuan=Pengajuan::first();
        $kp=Kartu_piutang::where('pengajuan_id','=',$pengajua->id)->first();
        $schedule->call(function () {
            Detail_Kartupiutang::where('status','=','belumbayar')
                                -> where('kartupiutang_id','=',$kp->id)->get();
        })->twiceMonthly( 18,19, 20, '13:00');

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
