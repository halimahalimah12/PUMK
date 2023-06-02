<?php

namespace App\Console\Commands;

use Mail;
use App\Models\Pengajuan;
use App\Models\Kartu_piutang;
use Illuminate\Console\Command;
use App\Mail\JatuhtempoSendEmail;
use Illuminate\Support\Facades\DB;
use App\Models\Detail_Kartupiutang;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\User;

class JatuhTempo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:jatuh-tempo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kirim jatuh tempo';

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
        $pengajuan=Pengajuan::first();
        $kp = Kartu_piutang::where('pengajuan_id',$pengajuan->id)->first();
        $detailkp = Detail_kartupiutang ::select('kartupiutang_id')
                ->where('status','=','belumbayar')
                ->groupBy('kartupiutang_id')
                ->where('kartupiutang_id',$kp->id)
                ->get();
        
        foreach ($kp as $p) {
            // Log::info("Cron job Berhasil di jalankan " );
            $user = DB::table('users')
            ->where('id',$pengajuan->user_id )->first();
            Mail::to($user->email)->send(new JatuhtempoSendEmail($user));
        }
        
        return 0;
        
    }
}
