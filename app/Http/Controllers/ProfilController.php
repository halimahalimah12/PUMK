<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Data_mitra;
use App\Models\Data_ush;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\file;

class ProfilController extends Controller
{
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user   = User::where('id', Auth::user()->id)->first();
        $ush    = Data_Ush::where('user_id',$user->id)->first();
        $mitra  = Data_Mitra::where('data_ush_id',$ush->id)->first();
        
        return view('dashboard.profil.index',compact('mitra','ush','user'));
        // return view('dashboard.profil.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ush    = Data_Ush::where('user_id',Auth::user()->id)->first();
        $mitra  = Data_Mitra::where('data_ush_id',$ush->id)->first();

        $validateData = $request->validate([
            'tmptlahir' => 'required|max:60',
            'tgllahir'  => 'required',
            'stsper'    => 'required',
            'gender'    => 'required',
            'alamat'    => 'required',
            'pekerjaan' => 'required',
            'klh'       => 'required|string',
            'kec'       => 'required|string',
            'kab'       => 'required|string',
            'notlp'     => 'required|numeric',
            'noktp'     => 'required|numeric',
            'tglktp'    => 'required|date',
            'pddk'      => 'required',
            'jbt'       => 'required | alpha', 
            'foto'      => 'image | file',
            'scanktp'   => 'image | file',

            'sektorush'    => 'required',
            'jnsush'    => 'required',
            'thnbrd'    => 'required|numeric',
            'almtush'   => 'required|string',
            'notlpush'  => 'required|numeric',
            'npwp'      => 'required|numeric',
            'tmptush'   => 'required',
            'bank'   => 'required',
            'almtbank'   => 'required',
            'atsnm'   => 'required',
            'norek'   => 'required',
        ]);
        
        $data_mitra = ([
            'tpt_lhr'   => $validateData['tmptlahir'] ,
            'tgl_lhr'   => $validateData['tgllahir'] ,
            'jk'        => $validateData['gender'] ,
            'sts_prk'   => $validateData['stsper'] ,
            'pekerjaan' => $validateData['pekerjaan'] ,
            'almt'      => $validateData['alamat'] ,
            'kel'       => $validateData['klh'] ,
            'kec'       => $validateData['kec'] ,
            'kab'       => $validateData['kab']  ,
            'no_hp'     => $validateData['notlp'] ,
            'no_ktp'    => $validateData['noktp']  ,
            'tgl_ktp'   => $validateData['tglktp']  ,
            'kursus'    => $request->kursus ,
            'jbt'       => $validateData['jbt']  ,
            'pddk'      => $validateData['pddk'] ,
        ]);

        if  ($request->file( 'scanktp')){
            $file       =   $request->file('scanktp');
            $namafile   =   time().str_replace(" ", "", $file->getClientOriginalName() );
            $file       ->  move('storage/dokumen',$namafile);
            $data_mitra ['scanktp'] = $namafile;
        }

        if  ($request->file( 'foto')){
            $file       =   $request->file('foto');
            $namafile   =   time().str_replace(" ", "", $file->getClientOriginalName() );
            $file       ->  move('storage/dokumen',$namafile);
            $data_mitra ['foto'] = $namafile;
        }

        $data_ush= ([
            'jnsush'        => $validateData['jnsush'] ,
            'sektorush'     => $validateData['sektorush'] ,
            'almtbank'      => $validateData['almtbank'] ,
            'thn_berdiri'   => $validateData['thnbrd'] ,
            'akta_ush'      => $request->aktaush ,
            'izin_ush'      => $request->izinush  ,
            'almt_ush'      => $validateData['almtush'] ,
            'nohp_ush'      => $validateData['notlpush'] ,
            'npwp'          => $validateData['npwp'] ,
            'tmptush'       => $validateData['tmptush'] ,
            'bank'          => $validateData['bank'] ,
            'atsnm'         => $validateData['atsnm'] ,
            'norek'         => $validateData['norek'] ,
        ]);

        $mitra->update($data_mitra);
        $ush->update($data_ush);

        $request->session()->flash('success',' Data Berhasil di perbarui ');

        return redirect('/profil')->with ('success','  Data Berhasil di perbarui ');
    }

    public function foto(){
        $user   = User::where('id', Auth::user()->id)->first();
        $mitra  = Data_Mitra::where('user_id',auth()->user()->id)->first();

        return view('dashboard.profil.foto',compact('mitra','user'));
    }

    public function scanktp(){
        $user   = User::where('id', Auth::user()->id)->first();
        $mitra  = Data_Mitra::where('user_id',auth()->user()->id)->first();

        return view('dashboard.profil.scanktp',compact('mitra','user'));
    }

}