<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Data_ush;
use App\Models\Data_mitra;
use App\Models\Pengajuan;
use App\Models\Kartu_piutang;
use App\Models\Pembayaran;
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
        // halamaan  user
        if($user->is_admin ==0 )
        {
            $pengajuan = Pengajuan::where('user_id',$user->id)->latest('id')->first();
            $mitra     = Data_Mitra::where('user_id',$user->id)->first();
            if($pengajuan != NULL){
                $kp =Kartu_piutang::where('pengajuan_id',$pengajuan->id)->latest('id')->first();
                return view('dashboard.kartu_piutang.index' ,compact('user','pengajuan','kp','mitra') );
            }
            return view('dashboard.kartu_piutang.index' ,compact('user','pengajuan','mitra') );
        } else {
            $kp = Kartu_piutang::get();
            return view('dashboard.kartu_piutang.index' ,compact('user','kp') );
        }
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
    public function cetak( $id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if($user->is_admin ==0 )
        { // halaman user
            $pengajuan = Pengajuan::where('user_id',$user->id)->first();
            $mitra     = Data_Mitra::where('user_id',$user->id)->first();
            $kp        = Kartu_piutang::where('pengajuan_id',$pengajuan->id)->latest('id')->first();
            $pdf = PDF::loadview('dashboard.kartu_piutang.cetak',compact('user','pengajuan','kp','mitra'))
                    ->setOptions(['defaultFont'=>'sans-serif']);
            return $pdf->setPaper('a4','potrait')->stream('kartu_piutang.pdf');
        } else {
            $user = User::where('id', Auth::user()->id)->first();
            $kp = Kartu_piutang::find($id);
            $pengajuan = Pengajuan::where('id',$kp->pengajuan_id)->first();
            $pdf = PDF::loadview('dashboard.kartu_piutang.cetak',compact('user','kp','pengajuan'))
                    ->setOptions(['defaultFont'=>'sans-serif']);
            return $pdf->setPaper('a4','potrait')->stream('kartu_piutang.pdf');
        }
        
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
        $pembayaran = Pembayaran::where('kartu_piutang_id',$kp->id)->get();
        $totpembayaran = Pembayaran::where('kartu_piutang_id',$kp->id)
                        ->where('status','=','valid')->sum('jumlah');

        return view('dashboard.kartu_piutang.view' ,compact('user','kp','pembayaran','totpembayaran') );
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
        $validateData = $request->validate([
            
            'tgl_penyaluran'    => 'required',
            'no_kontrak'   => 'required',
            'sb_thn'   => 'required',
            'sb_bln'   => 'required',
            'waktu'   => 'required',
        ]);
        $editkp = ([
            'tgl_penyaluran' => $validateData['tgl_penyaluran'],
            'no_kontrak' => $validateData['no_kontrak'],
            'sb_thn' => $validateData['sb_thn'],
            'sb_bln' => $validateData['sb_bln'],
            'waktu' => $validateData['waktu']
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
        $kp  = Kartu_piutang::find($id);
        $kp->delete();
        return redirect('/kartupiutang')->with('success','Data berhasil di hapus');
    }

    public function buktipembayaran($id)
    {
        $pembayaran = Pembayaran::find($id);
        return view('dashboard.pembayaran.bukti',compact('pembayaran'));
    }
}
