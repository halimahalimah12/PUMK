<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Omzet;
use App\Models\Pengajuan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\Kartu_piutang;
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
        // $pembayaran = Pembayaran::where('kartu_piutang_id',$kp->id)->get();
        $totpembayaran = Pembayaran::where('kartu_piutang_id',$kp1->id)
        ->where('status', '=', 'valid')
        ->sum('jumlah');

        return view('dashboard.laporan.lp_angsuran' , compact('user','kp','totpembayaran'));

    }

    function cetak_survei(){
        $pengajuan = Pengajuan::where('status','=','lulus_survei')->get();
        $pengajuan1 = Pengajuan::where('status','=','lulus_survei')->first();
        $sumomzet = Omzet::where('pengajuan_id', $pengajuan1->id)->sum('jmlh');
        $pdf = PDF::loadview('dashboard.laporan.cetak_survei', compact('pengajuan','sumomzet'))->setOptions(['defaultFont'=>'sans-serif']);
        return $pdf->setPaper('a4','landscape')->stream('laporan-survei.pdf');
    }

    function cetak_angsuran(){
        $pengajuan = Pengajuan::where('status','=','lulus_survei')->get();
        $sumomzet = Omzet::where('pengajuan_id', $pengajuan1->id)->sum('jmlh');
        $pdf = PDF::loadview('dashboard.laporan.cetak_survei', compact('pengajuan','sumomzet'))->setOptions(['defaultFont'=>'sans-serif']);
        return $pdf->setPaper('a4','landscape')->stream('laporan-survei.pdf');
    }
}