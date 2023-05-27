<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Data_ush;
use App\Models\Pengajuan;
use App\Models\Data_mitra;
use App\Models\Pembayaran;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Kartu_piutang;
use App\Traits\HasFormatRupiah; 
use Illuminate\Support\Facades\DB;
use App\Models\Detail_Kartupiutang;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\file;
use Illuminate\Support\Facades\Validator;

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
            $mitra->unreadNotifications->markAsRead();

            if($pengajuan != NULL){
                $kp =Kartu_piutang::where('pengajuan_id',$pengajuan->id)->latest('id')->first();
                if($kp != NULL) {
                    $detailkp = Detail_Kartupiutang::where('kartupiutang_id',$kp->id)->get();
                    return view('dashboard.kartu_piutang.index' ,compact('user','pengajuan','kp','mitra','detailkp') );
                }
            }
            return view('dashboard.kartu_piutang.index' ,compact('user','pengajuan','mitra') );
        } else {
            $kp = Kartu_piutang::orderByDesc('id')->get();
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
            $kp = Kartu_piutang::find($id);
            $detailkp = Detail_Kartupiutang::where('kartupiutang_id',$kp->id)->get();
            $pdf = PDF::loadview('dashboard.kartu_piutang.cetak',compact('user','pengajuan','kp','mitra','detailkp'))
                    ->setOptions(['defaultFont'=>'sans-serif']);
            return $pdf->setPaper('a4','potrait')->stream('kartu_piutang.pdf');
        } else {
            $user = User::where('id', Auth::user()->id)->first();
            $kp = Kartu_piutang::find($id);
            $pengajuan = Pengajuan::where('id',$kp->pengajuan_id)->first();
            $detailkp = Detail_Kartupiutang::where('kartupiutang_id',$kp->id)->get();
            $pdf = PDF::loadview('dashboard.kartu_piutang.cetak',compact('user','kp','pengajuan','detailkp'))
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
        $pembayaranvalid = Pembayaran::where('kartu_piutang_id',$kp->id)
                        ->where('status','=','valid')->get();
        $iddetailkp = Detail_Kartupiutang::where('kartupiutang_id',$kp->id)->first();
        $detailkp = Detail_Kartupiutang::where('kartupiutang_id',$kp->id)->get();
        if ($kp->tgl_penyaluran != NULL && $kp->sb_thn != NULL && $kp->sb_bln != NULL &&  $kp->no_kontrak != NULL ){
            $jasa = $this->hitungjasa($id);
            $jasa1 = $this->hitungjasa1($id);
            $pokok = $this->hitungpokok($id);
            $jumlah = $this->jumlah($id);
            $jumlah1 = $this->jumlah1($id);
        return view('dashboard.kartu_piutang.view' ,compact('user','pembayaranvalid','kp','jasa1','jasa','pokok','pembayaran','totpembayaran','jumlah','jumlah1','detailkp','iddetailkp' ) );
        }
        return view('dashboard.kartu_piutang.view' ,compact('user','pembayaranvalid','kp','pembayaran','totpembayaran','detailkp') );
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
        return redirect()->back()->with('flash_message_success','Data berhasil di perbarui, silahkan klik tombol simpan untuk menyimpan kartu piutang mitra'); 
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
    public function hitungjasa($id){
        $kp = Kartu_piutang::find($id);
        $i=1;
        $saldoawal = $kp->pinjaman;
        $sb_bln = $kp->sb_bln/100;
        $jasa = $saldoawal*$sb_bln;
        return $jasa;
    }
    public function hitungjasa1($id){
        $jasa = $this->hitungjasa($id);
        $jasa1= $jasa/2;
        return $jasa1;
    }

    public function hitungpokok($id){
        $kp = Kartu_piutang::find($id);
        $saldoawal = $kp->pinjaman;
        $waktu = $kp->waktu;
        $pokok = $saldoawal/$waktu;
        return $pokok;
    }

    public function pokok($id){
        $pembayaran = Pembayaran::find($id);
        $jumlah = $pembayaran->jumlah;
        $pokok = $this->hitungpokok($id);
        $pokokbayar =   $pokok - $jumlah;
        return $pokokbayar;
    }

    public function sisapinjaman($id){
        $kp = Kartu_piutang::find($id);
        $pembayaran = Pembayaran::where('kartu_piutang_id',$kp->id)
            ->where('status','=','valid')->sum('jumlah');
        $pinjaman = $kp->pinjaman;
        $sisapinjaman = $pinjaman - $pembayaran;
        return $sisapinjaman;
    }
    public function jumlah($id){
        $jumlah = 0;
        $pokok = $this->hitungpokok($id);
        $jasa  = $this->hitungjasa($id);
        $jumlah = $pokok+$jasa;
        return $jumlah; 
    }
    public function jumlah1($id){
        $jumlah = 0;
        $pokok = $this->hitungpokok($id);
        $jasa  = $this->hitungjasa1($id);
        $jumlah = $pokok+$jasa;
        return $jumlah; 
    }
    
    //Total pinjaman = pokok+jasa
    public function totpinjaman($id){
        $sum = 0;
        $jumlah = $this->hitungjasa($id);
        
    }

    public function detail_kp( Request $request){
        // dd($request);
        $idkp =$request->kartupiutang_id;
        $bulan=$request->bulan;
        $tahun=$request->tahun;
        $pokok       = $request->pokok ; 
        $jasa       = $request->jasa ; 
        $jumlah       = $request->jumlah ;
        $sisasaldo    = $request->sisasaldo; 

        for ($no =0 ; $no< count($jasa) ; $no++){
            $detailkp = new Detail_Kartupiutang;
            $detailkp->kartupiutang_id =  $idkp[$no] ;
            $detailkp->bulan      =   $bulan[$no];
            $detailkp->tahun   =  $tahun[$no] ;
            $detailkp->pokok         =    str_replace(".", "",$pokok[$no]);
            $detailkp->jasa   =    str_replace(".", "",$jasa[$no]);
            $detailkp->jumlah         =    str_replace(".", "",$jumlah[$no]);
            $detailkp->sisasaldo         =    str_replace(".", "",$sisasaldo[$no]);
            $detailkp->save();
        }

        $kp= Kartu_piutang::where('id',$idkp);
        // update data sum pokok,jasa,totkp
        $jmlh = ([
            'jmlhpokok' => str_replace(".", "",$request->sumpokok),
            'jmlhjasa' => str_replace(".", "",$request->sumjasa),
            'totkp' => str_replace(".", "",$request->sum),
        ]);
        $kp->update($jmlh);

        return redirect()->back()->with('flash_message_success','Data berhasil di masukan'); 

    }
    

}
