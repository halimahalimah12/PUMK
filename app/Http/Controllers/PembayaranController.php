<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Data_mitra;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\Kartu_piutang;
use App\Traits\HasFormatRupiah; 
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\file;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PembayaranNotification;
use App\Notifications\PembayaranKonfirmasiNotification;

class PembayaranController extends Controller
{
    function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        
        if( $user->is_admin == 0 )
        {
            $mitra = Data_mitra::where('user_id',$user->id)->first();
            $mitra->unreadNotifications->markAsRead();
            $pengajuan = Pengajuan::where('user_id',$user->id)->latest('id')->first();
            $kp = Kartu_piutang::where('pengajuan_id',$pengajuan->id)->latest('id')->first();
            $pem = Pembayaran::get();
            
            if( $pem->isNotEmpty() ){
                $pembayaran = Pembayaran::where('kartu_piutang_id',$kp->id)->get();
                $totpembayaran = Pembayaran::where('kartu_piutang_id',$kp->id)
                                ->where('status', '=', 'valid')
                                ->sum('jumlah');
                $totbulan = Pembayaran::where('kartu_piutang_id',$kp->id)
                                ->where('status', '=', 'valid')
                                ->sum('bulan');
            return view ('dashboard.pembayaran.index',compact('user','totbulan','mitra','kp','pem','pengajuan','pembayaran','totpembayaran'));
            }
            
            return view ('dashboard.pembayaran.index',compact('user','mitra','kp','pengajuan','pem'));
        }else{
            
            $pembayaran = Pembayaran::orderByDesc('id')->get();
            $user->unreadNotifications->markAsRead();
            return view ('dashboard.pembayaran.index',compact('user','pembayaran'));

        }
    }
    function store(Request $request)
    {
        $user      = User::where('id', Auth::user()->id)->first();
        $validateData = $request->validate([
            'tgl' => 'required',
            'bank' =>'required',
            'jumlah' =>'required',
            'foto'  =>'required',
        ]);

        $dtpembayaran = [
            'kartu_piutang_id' =>$request->idkp,
            'tgl' => $validateData['tgl'],
            'bank' =>  $validateData['bank'],
            'jumlah' =>  str_replace(",", "",$validateData['jumlah']),
            'pokok' => str_replace(",", "",$request->pokok),
            'jasa' => $request->jasa,
            'bulan' => $request->bulan,
        ];

        if  ($request->file('foto')){
            $file           =   $request->file('foto');
            $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
            $file           ->  move('storage/bukti_pembayaran',$namafile);
            $dtpembayaran['foto'] = $namafile;
        }
        // DB::beginTransaction();
        // try {
            
            $pembayaran = Pembayaran::create($dtpembayaran);
            $useradmin = User::where('is_admin','1')->get();
            Notification::send($useradmin, new PembayaranNotification($pembayaran));
            // $useradmin->notify(new PembayaranNotification($pembayaran) );
        //     DB::commit();
        // } catch (\Throwable $th) {
        //     DB::rollback();
        //     return redirect()->back()->with('gagal','Gagal menyimpan data pembayaran');
        // }
        
        return redirect('/pembayaran')->with ('success','Data Berhasil di masukan');

    }
    
    function valid($id)
    {
        try{
            
            $pembayaran = Pembayaran::where( 'id', $id)->first();
            $valid = ([
                'status' => "valid"
            ]) ;
            $pembayaran->update($valid);
            
            $mitra = $pembayaran->kartu_piutang->pengajuan->data_mitra;
            $mitra->notify(new PembayaranKonfirmasiNotification($pembayaran));
            \Session::flash('success', 'Tagihan berhasil disetujui');
                
        } catch( \Excaption $e) {
            \Session::flash('gagal', $e->getMessage());
        } 
        return redirect()->back();

    }
    function tidak_valid($id)
    {
        try{
            Pembayaran::where( 'id', $id)->update([
                'status' => "tidak"
            ]) ;
            \Session::flash('success', 'Tagihan berhasil tidak disetujui');
                
        } catch( \Excaption $e) {
            \Session::flash('gagal', $e->getMessage());
        } 
        return redirect()->back();
    }
}
