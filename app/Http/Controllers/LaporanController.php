<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Omzet;
use App\Models\Pengajuan;
use App\Models\Data_mitra;
use App\Models\Pembayaran;
use App\Models\Tenagakerja;
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
        $kp = Kartu_piutang::orderBy('id','DESC')->get();
        
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $byr = Pembayaran ::selectRaw('kartu_piutang_id')
                    ->where('pembayarans.status','=','valid')
                    ->whereBetween('tgl',[$start_date,$end_date])
                    ->selectRaw("SUM(pokok) as pokok")
                    ->selectRaw("SUM(jasa) as jasa")
                    ->selectRaw("SUM(jumlah) as jumlah")
                    ->groupBy('pembayarans.kartu_piutang_id')
                    ->get();
            return view('dashboard.laporan.lp_angsuran' , compact('user','kp','byr','start_date','end_date'));
        } else {
            $byr = Pembayaran ::selectRaw('kartu_piutang_id')
                    ->selectRaw("SUM(pokok) as pokok")
                    ->selectRaw("SUM(jasa) as jasa")
                    ->selectRaw("SUM(jumlah) as jumlah")
                    ->where('pembayarans.status','=','valid')
                    ->groupBy('pembayarans.kartu_piutang_id')
                    ->get();
        
        return view('dashboard.laporan.lp_angsuran' , compact('user','kp','byr'));

        }

    }

    function cetak_survei(){
        $pengajuan = Pengajuan::where('status','=','lulus_survei')->get();
        $pengajuan1 = Pengajuan::where('status','=','lulus_survei')->first();
        $pengajuanlama = Pengajuan::where('status','=','lulus')->latest('id')->first();
        $sumomzet = Omzet::where('pengajuan_id', $pengajuan1->id)->sum('jmlh');
        $countsdm = Tenagakerja::where('pengajuan_id', $pengajuan1->id)->count();
        $pdf = PDF::loadview('dashboard.laporan.cetak_survei', compact('pengajuan','sumomzet','countsdm','pengajuanlama'))->setOptions(['defaultFont'=>'sans-serif']);
        return $pdf->setPaper('a4','landscape')->stream('laporan-survei.pdf');
    }

    function cetak_angsuran(){
        $pengajuan= Pengajuan::first();
        $kp1 = Kartu_piutang::first();
        $pengajuan =Pengajuan::get();
        $kp = Kartu_piutang::get()
        ->groupBy(function ($val) {
            return Carbon::parse($val->tgl_penyaluran)->format('Y');
        });
        

        
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $byr = Pembayaran ::selectRaw('kartu_piutang_id')
            ->where('pembayarans.status','=','valid')
            ->whereBetween('tgl',[$start_date,$end_date])
            ->selectRaw("SUM(pokok) as pokok")
            ->selectRaw("SUM(jasa) as jasa")
            ->selectRaw("SUM(jumlah) as jumlah")
            ->groupBy('pembayarans.kartu_piutang_id')
            ->get();
            $tanggal = Pembayaran::where('kartu_piutang_id',$kp1->id)
            ->where('status', '=', 'valid')
            ->whereBetween('tgl',[$start_date,$end_date])
            ->latest('id')->first();
            
        } else {
            $byr = Pembayaran ::selectRaw('kartu_piutang_id')
            ->where('pembayarans.status','=','valid')
            ->selectRaw("SUM(pokok) as pokok")
            ->selectRaw("SUM(jasa) as jasa")
            ->selectRaw("SUM(jumlah) as jumlah")
            ->groupBy('pembayarans.kartu_piutang_id')
            ->get();
            $tanggal = Pembayaran::groupBy('kartu_piutang_id')
            ->where('status', '=', 'valid')
            ->latest('id')->first();
            
        }
        $pdf = PDF::loadview('dashboard.laporan.cetak_angsuran', compact('kp','kp1','byr','tanggal'))->setOptions(['defaultFont'=>'sans-serif']);
        return $pdf->setPaper('a4','potrait')->stream('laporan-angsuran.pdf');
    }
}
