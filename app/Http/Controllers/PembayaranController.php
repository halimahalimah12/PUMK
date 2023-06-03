<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Data_mitra;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\Kartu_piutang;
use App\Models\Detail_Kartupiutang;
use Intervention\Image\Image;
use App\Traits\HasFormatRupiah; 
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Mail\PembayaranSendingEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\file;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PembayaranNotification;
use App\Mail\PembayaranKonfirmasiSendingEmail;
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
            if ($pengajuan != NULL){
                $kp = Kartu_piutang::where('pengajuan_id',$pengajuan->id)->latest('id')->first();
                if ($kp != NULL) {
                    $detailkp = Detail_Kartupiutang::where('kartupiutang_id',$kp->id)->latest('id')->first();
                    if($kp != NULL && $detailkp != NULL){
                        $pem = Pembayaran::get();
                            if( $pem->isNotEmpty() ){
                                $pembayaran = Pembayaran::where('kartu_piutang_id',$kp->id)->get();
                                $totpembayaran = Pembayaran::where('kartu_piutang_id',$kp->id)
                                                ->where('status', '=', 'valid')
                                                ->sum('jumlah');
                                $totbulan = Pembayaran::where('kartu_piutang_id',$kp->id)
                                                ->where('status', '=', 'valid')
                                                ->sum('bulan');
                            return view ('dashboard.pembayaran.index',compact('user','totbulan','mitra','kp','pem','pengajuan','pembayaran','detailkp','totpembayaran'));
                            }
                        return view ('dashboard.pembayaran.index',compact('user','mitra','kp','pem','pengajuan','detailkp'));
                    }
                }else {
                    return view ('dashboard.pembayaran.index',compact('user','pengajuan','mitra','kp'));
                }
                return view ('dashboard.pembayaran.index',compact('user','mitra','kp','pengajuan','detailkp'));
        }
            
            return view ('dashboard.pembayaran.index',compact('user','mitra','pengajuan'));
        }else{
            
            $pembayaran = Pembayaran::orderByDesc('id')->get();
            $kp = Kartu_piutang::first();
            if($kp != null) {
                $lunas = Pembayaran::where('status','=','valid')
                    ->where('kartu_piutang_id','=',$kp->id)->sum('jumlah');
            return view ('dashboard.pembayaran.index',compact('user','pembayaran','lunas','kp'));
            }
            
            $user->unreadNotifications->markAsRead();
            return view ('dashboard.pembayaran.index',compact('user','pembayaran','kp'));
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
            $dtpembayaran['foto']       =   time().str_replace(" ", "", $file->getClientOriginalName() );
            $tujuanpath= public_path('/storage/bukti_pembayaran');
            $img =\Image::make($file->path());
            
            $img->resize(800,800,function($constraint){
                $constraint->aspectRatio();
            })->save($tujuanpath.'/'.$dtpembayaran['foto']);
            
        }
            
        $pembayaran = Pembayaran::create($dtpembayaran);
        $useradmin = User::where('is_admin','1')->get();
        Notification::send($useradmin, new PembayaranNotification($pembayaran));

        Mail::to($request->user())->send(new PembayaranSendingEmail($pembayaran));
        
        return redirect('/pembayaran')->with ('success','Data Berhasil di masukan');

    }
    
    function valid(Request $request ,$id)
    {
        try{
            
            $pembayaran = Pembayaran::find($id);
            $valid = ([
                'status' => "valid"
            ]) ;
            $pembayaran->update($valid);
            $sdhbyr = Detail_kartupiutang::where('kartupiutang_id',$pembayaran->kartu_piutang_id)->first();
            
            $bayar =([
                'status' =>"sudahbayar"
            ]);
            $sdhbyr->update($bayar);
            // dd($bayar);

            $mitra = $pembayaran->kartu_piutang->pengajuan->data_mitra;
            $mitra->notify(new PembayaranKonfirmasiNotification($pembayaran));
            Mail::to($pembayaran->kartu_piutang->pengajuan->user->email)->send(new PembayaranKonfirmasiSendingEmail($pembayaran));
            \Session::flash('success', 'Tagihan berhasil disetujui');
                
        } catch( \Excaption $e) {
            \Session::flash('gagal', $e->getMessage());
        } 
        return redirect()->back();

    }
    function tidak_valid(Request $request , $id)
    {
        try{            
            $pembayaran = Pembayaran::where( 'id', $id)->first();
            $tidakvalid = ([
                'status' => "tidak"
            ]) ;
            $pembayaran->update($tidakvalid);
            
            $mitra = $pembayaran->kartu_piutang->pengajuan->data_mitra;
            $mitra->notify(new PembayaranKonfirmasiNotification($pembayaran));
            Mail::to($pembayaran->kartu_piutang->pengajuan->user->email)->send(new PembayaranKonfirmasiSendingEmail($pembayaran));

            \Session::flash('success', 'Tagihan berhasil tidak disetujui');
                
        } catch( \Excaption $e) {
            \Session::flash('gagal', $e->getMessage());
        } 
        return redirect()->back();
    }
}
