<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Omzet;
use App\Models\Pengajuan;
use App\Models\Data_mitra;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\Kartu_piutang;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $pengajuan = Pengajuan::where('status','=','lulus_survei')->get();

        return view('dashboard.laporan.lp_survei' , compact('user','pengajuan'));

    }
    function angsuran()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $kp = Kartu_piutang::get();
        $kp1 = Kartu_piutang::first();
        
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $totpembayaran = Pembayaran::where('kartu_piutang_id',$kp1->id)
            ->where('status', '=', 'valid')
            ->whereBetween('tgl',[$start_date,$end_date])
            ->sum('jumlah');
            $totpokok = Pembayaran::where('kartu_piutang_id',$kp1->id)
            ->where('status', '=', 'valid')
            ->whereBetween('tgl',[$start_date,$end_date])
            ->sum('pokok');
            $totjasa = Pembayaran::where('kartu_piutang_id',$kp1->id)
            ->where('status', '=', 'valid')
            ->whereBetween('tgl',[$start_date,$end_date])
            ->sum('jasa');
            return view('dashboard.laporan.lp_angsuran' , compact('user','kp','totpembayaran','totpokok','totjasa','start_date','end_date'));

        } else {
            $totpembayaran = Pembayaran::where('kartu_piutang_id',$kp1->id)
            ->where('status', '=', 'valid')
            ->sum('jumlah');
            $totpokok = Pembayaran::where('kartu_piutang_id',$kp1->id)
            ->where('status', '=', 'valid')
            ->sum('pokok');
            $totjasa = Pembayaran::where('kartu_piutang_id',$kp1->id)
            ->where('status', '=', 'valid')
            ->sum('jasa');
        return view('dashboard.laporan.lp_angsuran' , compact('user','kp','totpembayaran','totpokok','totjasa'));

        }

        
        

    }

    function cetak_survei(){
        $pengajuan = Pengajuan::where('status','=','lulus_survei')->get();
        $pengajuan1 = Pengajuan::where('status','=','lulus_survei')->first();
        $sumomzet = Omzet::where('pengajuan_id', $pengajuan1->id)->sum('jmlh');
        $pdf = PDF::loadview('dashboard.laporan.cetak_survei', compact('pengajuan','sumomzet'))->setOptions(['defaultFont'=>'sans-serif']);
        return $pdf->setPaper('a4','landscape')->stream('laporan-survei.pdf');
    }

    function cetak_angsuran(){
        $pengajuan= Pengajuan::first();
        $kp = Kartu_piutang::where('pengajuan_id',$pengajuan->id)
        ->get()
        ->groupBy(function($val){
            return Carbon::parse($val->tgl_penyaluran)->format('Y');
        });

        $kp1 = Kartu_piutang::first();
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $totpembayaran = Pembayaran::where('kartu_piutang_id',$kp1->id)
            ->where('status', '=', 'valid')
            ->whereBetween('tgl',[$start_date,$end_date])
            ->sum('jumlah');
            $totpokok = Pembayaran::where('kartu_piutang_id',$kp1->id)
            ->where('status', '=', 'valid')
            ->whereBetween('tgl',[$start_date,$end_date])
            ->sum('pokok');
            $totjasa = Pembayaran::where('kartu_piutang_id',$kp1->id)
            ->where('status', '=', 'valid')
            ->whereBetween('tgl',[$start_date,$end_date])
            ->sum('jasa');
            $tanggal = Pembayaran::where('kartu_piutang_id',$kp1->id)
            ->where('status', '=', 'valid')
            ->whereBetween('tgl',[$start_date,$end_date])
            ->latest('id')->first();
            
        } else {
            $totpembayaran = Pembayaran::where('kartu_piutang_id',$kp1->id)
            ->where('status', '=', 'valid')
            ->sum('jumlah');
            $totpokok = Pembayaran::where('kartu_piutang_id',$kp1->id)
            ->where('status', '=', 'valid')
            ->sum('pokok');
            $totjasa = Pembayaran::where('kartu_piutang_id',$kp1->id)
            ->where('status', '=', 'valid')
            ->sum('jasa');
            $tanggal = Pembayaran::where('kartu_piutang_id',$kp1->id)
            ->where('status', '=', 'valid')
            ->latest('id')->first();
            
        }
        $pdf = PDF::loadview('dashboard.laporan.cetak_angsuran', compact('kp','kp1','totpembayaran','totpokok','tanggal','totjasa','totjasa'))->setOptions(['defaultFont'=>'sans-serif']);
        return $pdf->setPaper('a4','potrait')->stream('laporan-angsuran.pdf');
    }
}
