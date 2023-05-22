<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

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
    protected $description = 'Send a Daily email to all users with a word and its meaning';

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
        // $words = [
        //     'tidakvalid' => 'pembayaran anda bulan ini tidak valid silahkan lakukan penguploadan bukti pembayarannya lagi',
        //     'convivial' => 'Kepada mitra yang terhormat, pada bulan ini anda belum melakukan pembayaran tagihan. Silahkan lakukan pembayaran dan upload bukti pembayaran',
        // ];
        
        // // Finding a random word
        // $key = array_rand($words);
        // $value = $words[$key];
        
        // $users = User::all();
        
        
        // foreach ($users as $user) {
        //     Mail::raw("{$key} -> {$value}", function ($mail) use ($user) {
        //         $mail->from('info@tutsforweb.com');
        //         $mail->to($user->email)
        //             ->subject('Jatuh tempo pembayaran');
        //     });
        // }

         // Finding a random word
        
        // $users = User::first();
        // $pengajuan= Pengajuan::where('user_id','=',$user->id)->latest('id');
        // $kartupiutang = Kartu_piutang::where('pengajuan_id','=',$pengajuan->id)->first();
        // $pembayaran = Pembayaran::where('kartu_piutang_id','=',$kartupiutang->id)
        //                 ->where('status','=','belumbayar')->first();
        
        $users= DB::table('users')
                ->where('pembayarans', 'pembayarans.status','=','belumbayar')
                ->where('pembayarans', 'kartu_piutangs.id','=','pembayarans.kartu_piutang_id')
                ->where('kartu_piutangs', 'pengajuans.id','=','kartu_piutangs.pengajuan_id')
                ->where('users','pengajuans.user_id','=','users.id')->get();
        
        foreach ($users as $user) {
            Mail::raw( function ($mail) use ($user) {
                $mail->from('info@tutsforweb.com');
                $mail->to($user->email)
                    ->subject('Jatuh tempo pembayaran')
                    ->massage('Kepada mitra yang terhormat,');
            });
        }
        
        
        $this->info('Word of the Day sent to All Users');
    
    }
}
