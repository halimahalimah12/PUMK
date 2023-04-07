<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Data_mitra;
use App\Models\Pembayaran;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Kartu_piutang;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\file;
use App\Traits\HasFormatRupiah; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PembayaranController extends Controller
{
    function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if( $user->is_admin == 0 )
        {
            $mitra = Data_mitra::where('user_id',$user->id)->first();
            $pengajuan = Pengajuan::where('user_id',$user->id)->first();
            $kp = Kartu_piutang::where('pengajuan_id',$pengajuan->id)->latest('id')->first();
            $pembayaran = Pembayaran::where('kartu_piutang_id',$kp->id)->get();
            $totpembayaran = Pembayaran::where('kartu_piutang_id',$kp->id)
                            ->where('status', '=', 'valid')
                            ->sum('jumlah');
            $totbulan = Pembayaran::where('kartu_piutang_id',$kp->id)
                            ->where('status', '=', 'valid')
                            ->sum('bulan');
            return view ('dashboard.pembayaran.index',compact('user','totbulan','mitra','kp','pengajuan','pembayaran','totpembayaran'));
        }else{
            $notification= Notification::where('id_tujuan','=','1')->get();
            $countnotifikasi = Notification::where('id_tujuan','=','1')->count();
            $pengajuan = Pengajuan::first() ;
            $kp = Kartu_piutang::where('pengajuan_id', $pengajuan->id)->first();
            $pembayaran = Pembayaran::where('kartu_piutang_id',$kp->id)->orderByDesc('id')->get();
            return view ('dashboard.pembayaran.index',compact('user','kp','pembayaran','notification','countnotifikasi'));

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
        $pembayaran = new Pembayaran;
        $pembayaran->kartu_piutang_id = $request->idkp;
        $pembayaran->tgl = $validateData['tgl'];
        $pembayaran->bank = $validateData['bank'];
        $pembayaran->jumlah = str_replace(",", "",$validateData['jumlah']);
        $pembayaran->pokok = $request->pokok;
        $pembayaran->jasa = $request->jasa;
        $pembayaran->bulan = $request->bulan;
        $notifikasi= new Notification;
        $notifikasi->type = $request->typenotifikasi;
        $notifikasi->id_tujuan = $request->tujuan;
        $notifikasi->data = $request->pesan;
        $notifikasi->save();

        if  ($request->file('foto')){
            $file           =   $request->file('foto');
            $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
            $file           ->  move('storage/bukti_pembayaran',$namafile);
            $pembayaran['foto'] = $namafile;
        }
        
        $pembayaran->save();
        return redirect('/pembayaran')->with ('success','Data Berhasil di masukan');


        
    }
    function valid($id)
    {
        try{
            Pembayaran::where( 'id', $id)->update([
                'status' => "valid"
            ]) ;
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
