<?php

namespace App\Http\Controllers;
use App\Models\Data_ush;
use App\Models\Data_mitra;
use App\Models\Pengajuan;
use App\Models\Kartu_piutang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\file;
use Illuminate\Support\Facades\Validator;
use App\Traits\HasFormatRupiah; 

class KrtpiutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $ush       = Data_Ush::first();
        $mitra     = Data_Mitra::where('data_ush_id',$ush->id)->first();
        $pengajuan = Pengajuan::where('data_mitra_id',$mitra->id)->first();
        $kp = Kartu_piutang::where('pengajuan_id',$pengajuan->id)->get();
        return view('dashboard.kartu_piutang.index' ,compact('user','ush','mitra','pengajuan','kp') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $kp = Kartu_piutang::find($id);
        return view('dashboard.kartu_piutang.view' ,compact('user','kp') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kp = Kartu_piutang::find($id);
        $editkp = ([
            'tgl_penyaluran' => $request->tgl,
            'no_kontrak' => $request->no_kontrak,
            'sb_thn' => $request->sbthn,
            'sb_bln' => $request->sbbln,
        ]);

        $kp->update($editkp);

        return redirect()->back()->with('flash_message_success','Data berhasil di perbarui'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
