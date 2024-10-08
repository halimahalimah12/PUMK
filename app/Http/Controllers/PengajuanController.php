<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Pjb;
use App\Models\Alat;
use App\Models\Aset;
use App\Models\User;
use App\Models\Omzet;
use App\Models\Manfaat;
use App\Models\Data_ush;
use App\Models\Pengajuan;
use App\Models\Data_mitra;
use App\Models\Oprasional;
use App\Models\Tenagakerja;
use Illuminate\Http\Request;
use App\Models\Kartu_piutang;
use App\Traits\HasFormatRupiah; 
use App\Notifications\Notifikasi;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Mail\PengajuanSendingEmail;
// use Peronh\PDFCompress\PDFCompress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\file;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Notifications\PengajuanNotification;
use Illuminate\Support\Facades\Notification;
use App\Mail\PengajuanKonfirmasiSendingEmail;
use App\Notifications\PengajuanKonfirmasiNotification;
use App\Mail\PengajuanLunasSendingEmail;
use App\Notifications\PengajuanLunasNotification;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Image;



class PengajuanController extends Controller
{
    use HasFormatRupiah; 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user      = User::where('id', Auth::user()->id)->first();
        
        // halamaan  user
        if($user->is_admin ==0 )
        {
            $mitra     = Data_Mitra::where('user_id',$user->id)->first();
            $mitra->unreadNotifications->markAsRead();
            $ush       = Data_Ush::where('user_id',$user->id)->first();
            $pengajuan = Pengajuan::where('data_mitra_id',$mitra->id)->orderByDesc('id')->get();
            $last      = DB::table('pengajuans')
                        ->where('user_id',$user->id)
                        ->latest('id')->first();
            return view('dashboard.pengajuan.index' ,compact('pengajuan','user','last','mitra','ush') );
        }else{
            $pengajuan1 = Pengajuan::orderByDesc('id')->get();
            $summenunggu= Pengajuan::where('status','=','menunggu')->count();

            return view('dashboard.pengajuan.index' ,compact('pengajuan1','user','summenunggu') );
        }
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user      = User::where('id', Auth::user()->id)->first();
        $ush       = Data_Ush::where('user_id',$user->id)->first();
        $mitra     = Data_Mitra::where('data_ush_id',$ush->id)->first();
        $pengajuan = Pengajuan::where('user_id', $user->id)->first();
        if ( $pengajuan != NULL ){
            $last      = Pengajuan::where('user_id',$user->id)->latest('id')->first();
            $lastalat  = Alat::where('pengajuan_id', $last->id)->latest('id')->get();
            $lasttk    = Tenagakerja::where('pengajuan_id', $last->id)->latest('id')->get();
            $lastomzet = Omzet::where('pengajuan_id', $last->id)->latest('id')->get();
            $lastmanfaat = Manfaat::where('pengajuan_id', $last->id)->latest('id')->get();
        return view('dashboard.pengajuan.create',compact('mitra','ush','user','last','lastalat','pengajuan','lasttk','lastomzet','lastmanfaat') );
        }
        return view('dashboard.pengajuan.create',compact('mitra','ush','pengajuan','user') );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user      = User::where('id', Auth::user()->id)->first();
        $mitra     = Data_Mitra::where('user_id',$user->id)->first();
        $validateData = \Validator::make($request->all(),[
            // pjb
            'nm_pjb'    => 'required|max:255|alpha',
            'tpt_lhr'   => 'required|max:255|alpha',
            'tgl_lhr'   => 'required',
            'hub'       => 'required|max:255',
            'gender'    => 'required',
            'pekerjaan' => 'required|max:255|alpha',
            'almt'      => 'required|max:255',
            'no_hp'     => 'required|numeric',
            'no_ktp'    => 'required|numeric',
            'tgl_ktp'   => 'required|date',
            'pddk'      => 'required',
            'jbt'       => 'required | alpha', 
            'foto'      => 'required |mimes:jpeg,png,jpg|max:10240',
            'scanktp'   => 'required |mimes:jpeg,png,jpg|max:10240',

            'tanah'     => 'required|max:20',
            'bangunan'  => 'required|max:20',
            'persediaan'=> 'required|max:20',
            'peralatan' => 'required|max:20',
            'kas'       => 'required|max:20',
            'piutang'   => 'required|max:20',
            'alat'      => 'required|max:20',
            'totaset'   => 'required|max:255',

            'transport' => 'required|max:20',
            'listrik'   => 'required|max:20',
            'telp'      => 'required|max:20',
            'atk'       => 'required|max:20',
            'lain'      => 'required|max:20',
            'totop'     => 'required|max:255',

            'modal'     => 'required|max:20',
            'invest'    => 'required|max:20',
            'bsr_pjm'   => 'required|max:255',

            'bkt_serius'    => 'required |mimes:jpeg,png,jpg,pdf|max:10240',
            'kk'            => 'required |mimes:jpeg,png,jpg|max:10240',
            'foto_kegiatan' => 'required |mimes:jpeg,png,jpg|max:10240',
            'surat_ush'     => 'required |mimes:jpeg,png,jpg,pdf|max:10240',
            'srt_blmbina'   => 'required |mimes:jpeg,png,jpg,pdf|max:10240',
            'srt_pjb'       => 'required |mimes:jpeg,png,jpg,pdf|max:10240',
            'srt_ksglns'    => 'required |mimes:jpeg,png,jpg,pdf|max:10240',
        ]);

        if (!$validateData->passes()) {
            return response()->json(['code'=>0,'error'=>$validateData->errors()->toArray()]);
        } else {

            DB::beginTransaction();
            try{
                $pjb = new Pjb;
                $pjb->nm        =   $request->nm_pjb;
                $pjb->jk        =   $request->gender;
                $pjb->tpt_lhr   =   $request->tpt_lhr;
                $pjb->tgl_lhr   =   $request->tgl_lhr;
                $pjb->hub       =   $request->hub;
                $pjb->almt      =   $request->almt;
                $pjb->pekerjaan =   $request->pekerjaan;
                $pjb->no_hp     =   $request->no_hp;
                $pjb->no_ktp    =   $request->no_ktp;
                $pjb->tgl_ktp   =   $request->tgl_ktp;
                $pjb->kursus    =   $request->kursus;
                $pjb->pddk      =   $request->pddk;
                $pjb->jbt       =   $request->jbt; 
                $pjb->foto      =   $request->foto;
                $pjb->scanktp   =   $request->scanktp;
        
                if  ($request->file('foto')){
                    $file           =   $request->file('foto');
                    $pjb['foto']       =   time().str_replace(" ", "", $file->getClientOriginalName() );
                    $tujuanpath= public_path('/storage/dokumen');
                    $img =\Image::make($file->path());
                    
                    $img->resize(800,800,function($constraint){
                        $constraint->aspectRatio();
                    })->save($tujuanpath.'/'.$pjb['foto']  );
                }
        
                if  ($request->file('scanktp')){
                    $file           =   $request->file('scanktp');
                    $pjb['scanktp']       =   time().str_replace(" ", "", $file->getClientOriginalName() );
                    $tujuanpath= public_path('/storage/dokumen');
                    $img =\Image::make($file->path());
                    
                    $img->resize(800,800,function($constraint){
                        $constraint->aspectRatio();
                    })->save($tujuanpath.'/'.$pjb['scanktp']   );
                }
                
                $pjb->save();
        
                $aset = new Aset;
                $aset->tanah           = str_replace(",", "", $request->tanah); 
                $aset->bangunan        = str_replace(",", "",$request->bangunan); 
                $aset->persediaan      = str_replace(",", "",$request->persediaan); 
                $aset->alat            = str_replace(",", "",$request->alat); 
                $aset->kas             = str_replace(",", "",$request->kas); 
                $aset->piutang         = str_replace(",", "",$request->piutang); 
                $aset->peralatan       = str_replace(",", "",$request->peralatan); 
                $totset = str_replace(".00", "",$request->totaset);
                $aset->totaset         = str_replace(",", "",$totset); 
                $aset->save();
                
                $oprasional = new Oprasional;
                $oprasional->transport = str_replace(",", "",$request->transport); 
                $oprasional->listrik   = str_replace(",", "",$request->listrik); 
                $oprasional->telpon    = str_replace(",", "",$request->telp); 
                $oprasional->atk       = str_replace(",", "",$request->atk); 
                $oprasional->lain      = str_replace(",", "",$request->lain);
                $totop= str_replace(".00", "",$request->totop);
                $oprasional->totop     = str_replace(",", "",$totop); 
                $oprasional->save();
        
                $pengajuan = new Pengajuan;
                $pengajuan->user_id         = $user->id;
                $pengajuan->data_mitra_id   = $mitra->id;
                $pengajuan->pjb_id          = $pjb->id;
                $pengajuan->aset_id         = $aset->id;
                $pengajuan->oprasional_id   = $oprasional->id;
        
                $pengajuan->modal        = str_replace(",", "",$request->modal); 
                $pengajuan->investasi    = str_replace(",", "",$request->invest); 
                $bsr_pjm= str_replace(".00", "",$request->bsr_pjm);
                $pengajuan->bsr_pinjaman = str_replace(",", "",$bsr_pjm); 
                
        
                if  ($request->file( 'bkt_serius')){
                    $file           =   $request->file('bkt_serius');
                    $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
                    $file           ->  move('storage/dokumen',$namafile);
                    $pengajuan['bkt_keseriusan'] = $namafile;
                }
        
                if  ($request->file( 'kk')){
                    $file           =   $request->file('kk');
                    $pengajuan['kk']      =   time().str_replace(" ", "", $file->getClientOriginalName() );
                    $tujuanpath= public_path('/storage/dokumen');
                    $img =\Image::make($file->path());
                    
                    $img->resize(800,800,function($constraint){
                        $constraint->aspectRatio();
                    })->save($tujuanpath.'/'.$pengajuan['kk'] );
                }
        
                if  ($request->file( 'foto_kegiatan')){
                    $file           =   $request->file('foto_kegiatan');
                    $pengajuan['foto_kegiatan']   =   time().str_replace(" ", "", $file->getClientOriginalName() );
                    $tujuanpath= public_path('/storage/dokumen');
                    $img =\Image::make($file->path());
                    
                    $img->resize(800,800,function($constraint){
                        $constraint->aspectRatio();
                    })->save($tujuanpath.'/'.$pengajuan['foto_kegiatan'] );
                }
        
                if  ($request->file( 'surat_ush')){
                    $file           =   $request->file('surat_ush');
                    $namafile     =   time().str_replace(" ", "", $file->getClientOriginalName() );
                    $tujuanpath= public_path('/storage/dokumen');
                    $file           ->  move('storage/dokumen',$namafile);
                    $pengajuan['surat_ush_rt'] = $namafile;
                }
                
                if  ($request->file( 'srt_blmbina')){
                    $file           =   $request->file('srt_blmbina');
                    $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
                    $file           ->  move('storage/dokumen',$namafile);
                    $pengajuan['surat_blmbina'] = $namafile;
                }
        
                if  ($request->file( 'srt_pjb')){
                    $file           =   $request->file('srt_pjb');
                    $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
                    $file           ->  move('storage/dokumen',$namafile);
                    $pengajuan['surat_pj'] = $namafile;
                } 
                if  ($request->file( 'srt_ksglns')){
                    $file           =   $request->file('srt_ksglns');
                    $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
                    $file           ->  move('storage/dokumen',$namafile);
                    $pengajuan['surat_ksglns'] = $namafile;
                }
        
                $pengajuan->save(); 
        
                $nm_brg     = $request->nm_brg ;
                $hrg_satuan = $request->hrg_satuan ;
                $jmlh       = $request->jmlh ; 
                
                for ($no =0 ; $no< count($nm_brg) ; $no++){
                    $alat = new Alat;
                    $alat->pengajuan_id =   $pengajuan->id;
                    $alat->nm_brg       =   $nm_brg[$no];
                    $alat->hrg_satuan   =   str_replace(",", "",$hrg_satuan[$no]);
                    $alat->jmlh         =   str_replace(",", "",$jmlh[$no]);
                    $alat->save();
                }
        
                $nmkry     = $request->nmkry;
                $jbtkry    = $request->jbtkry;
                $gaji      = $request->gaji;
        
                for ($no =0 ; $no< count($nmkry) ; $no++ ) { 
                    $tenagakerja = new Tenagakerja;
                    $tenagakerja->pengajuan_id = $pengajuan->id;
                    $tenagakerja->nm_tngk      = $nmkry[$no];
                    $tenagakerja->jbt          = $jbtkry[$no];
                    $tenagakerja->gaji         = str_replace(",", "",$gaji[$no]);
                    $tenagakerja->save();
                }
                
                $nmomzet    = $request->nmomzet;
                $hrgomzet   = $request->hrgomzet;
                $jmlhomzet  = $request->jmlhomzet;
        
                for ($no =0 ; $no<count($nmomzet) ; $no++ ) { 
                    $omzet = new Omzet;
                    $omzet->pengajuan_id    =   $pengajuan->id;
                    $omzet->nm_brg          =   $nmomzet[$no];
                    $omzet->hrg_satuan      =   str_replace(",", "",$hrgomzet[$no]);
                    $omzet->jmlh            =   str_replace(",", "",$jmlhomzet[$no]);
                    $omzet->save();
                }
        
                $faat = $request->manfaat;
                for ($no = 0 ; $no<count($faat) ; $no++ ) { 
                    $manfaat = new Manfaat;
                    $manfaat->pengajuan_id =    $pengajuan->id;
                    $manfaat->manfaat      =    $faat[$no];
                    $manfaat->save();
                }

                DB::commit();
    
                $useradmin = User::where('is_admin','1')->get();
                Notification::send($useradmin, new PengajuanNotification($pengajuan));    
                
                Mail::to($request->user())->send(new PengajuanSendingEmail($pengajuan));
    
                return response()->json(['code'=>1,'success'=>'Data Berhasil di Upload ']);

            }catch( \Illuminate\Database\QueryException $e) {
                DB::rollback();
                return redirect()->back()->with('gagal','Pada bagian alat/ tenaga kerja/ omzet/ manfaat harus diisi minimal 1');
            } 
        }
    }

    public function show($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->unreadNotifications->markAsRead();
        if($user->is_admin ==0 )
        { // halaman user
            $ush        = Data_Ush::where('user_id',Auth::user()->id)->first();
            $mitra        = Data_mitra::where('user_id',Auth::user()->id)->first();
            $pengajuan1 = Pengajuan::find($id);
            $alat       = Alat::where('pengajuan_id',$pengajuan1->id)->get();
            $tenaga     = Tenagakerja::where('pengajuan_id',$pengajuan1->id)->get();
            $omzet      = Omzet::where('pengajuan_id',$pengajuan1->id)->get();
            $totalat      = Alat::where('pengajuan_id',$pengajuan1->id)->sum('jmlh');
            $totgaji     = Tenagakerja::where('pengajuan_id',$pengajuan1->id)->sum('gaji');
            $totomzet     = Omzet::where('pengajuan_id',$pengajuan1->id)->sum('jmlh');

            return view('dashboard.pengajuan.detail' ,compact('pengajuan1','ush','user','mitra','alat','tenaga','omzet' ,'totomzet','totalat','totgaji') );    
        } else{
        // halaman admin
            $pengajuan = Pengajuan::find($id);
            $alat       = Alat::where('pengajuan_id',$pengajuan->id)->get();
            $tenaga     = Tenagakerja::where('pengajuan_id',$pengajuan->id)->get();
            $omzet      = Omzet::where('pengajuan_id',$pengajuan->id)->get();
            $totalat      = Alat::where('pengajuan_id',$pengajuan->id)->sum('jmlh');
            $totgaji     = Tenagakerja::where('pengajuan_id',$pengajuan->id)->sum('gaji');
            $totomzet     = Omzet::where('pengajuan_id',$pengajuan->id)->sum('jmlh');
        
        return view('dashboard.pengajuan.detail' ,compact('pengajuan','user','alat','tenaga','omzet' ,'totomzet','totalat','totgaji') );
        }
    }

    public function cetak($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if($user->is_admin ==0 )
        { // halaman user
            $ush        = Data_Ush::where('user_id',Auth::user()->id)->first();
            $mitra      = Data_Mitra::where('data_ush_id',$ush->id)->first();
            $pengajuan1 = Pengajuan::where('data_mitra_id',$mitra->id)->first();
            $alat       = Alat::where('pengajuan_id',$pengajuan1->id)->get();
            $tenaga     = Tenagakerja::where('pengajuan_id',$pengajuan1->id)->get();
            $omzet      = Omzet::where('pengajuan_id',$pengajuan1->id)->get();
            $totalat      = Alat::where('pengajuan_id',$pengajuan1->id)->sum('jmlh');
            $totgaji     = Tenagakerja::where('pengajuan_id',$pengajuan1->id)->sum('gaji');
            $totomzet     = Omzet::where('pengajuan_id',$pengajuan1->id)->sum('jmlh');
            $manfaat      = Manfaat::where('pengajuan_id',$pengajuan1->id)->get();
            $pdf = PDF::loadview('dashboard.pengajuan.dokumen.cetak',compact('totalat','totgaji','ush','manfaat','omzet','alat','tenaga','pengajuan1','user', 'totomzet'))->setOptions(['defaultFont'=>'sans-serif']);

            return $pdf->setPaper('a4','potrait')->stream('pengajuan.pdf');
        } else{
        // halaman admin
            $pengajuan1 = Pengajuan::find($id);
            $alat       = Alat::where('pengajuan_id',$pengajuan1->id)->get();
            $tenaga     = Tenagakerja::where('pengajuan_id',$pengajuan1->id)->get();
            $omzet      = Omzet::where('pengajuan_id',$pengajuan1->id)->get();
            $manfaat      = Manfaat::where('pengajuan_id',$pengajuan1->id)->get();
            $totalat      = Alat::where('pengajuan_id',$pengajuan1->id)->sum('jmlh');
            $totgaji     = Tenagakerja::where('pengajuan_id',$pengajuan1->id)->sum('gaji');
            $totomzet     = Omzet::where('pengajuan_id',$pengajuan1->id)->sum('jmlh');
            $pdf = PDF::loadview('dashboard.pengajuan.dokumen.cetak_id',compact('totalat','totgaji','manfaat','omzet','alat','tenaga','pengajuan1','user', 'totomzet'))->setOptions(['defaultFont'=>'sans-serif']);

            return $pdf->setPaper('a4','potrait')->stream('pengajuan.pdf');
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
        $pengajuan = Pengajuan::find($id);
        $alat       = Alat::where('pengajuan_id',$pengajuan->id)->get();
        $tenaga     = Tenagakerja::where('pengajuan_id',$pengajuan->id)->get();
        $omzet      = Omzet::where('pengajuan_id',$pengajuan->id)->get();
        $manfaat      = Manfaat::where('pengajuan_id',$pengajuan->id)->get();

        return view ('dashboard.pengajuan.edit',compact('pengajuan','user','alat','tenaga','omzet' ,'manfaat'));
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
        
        $pengajuan  = Pengajuan::find($id);
        // $pengajuan1 = Pengajuan::where('id',$pengajuan->id);
        $pjb = Pjb::where('id',$pengajuan->pjb_id);
        $aset = Aset::where('id',$pengajuan->aset_id);
        $oprasional = Oprasional::where('id',$pengajuan->oprasional_id);
        $alat = Alat::where('pengajuan_id',$pengajuan->id)->delete();
        $tenagakerja =  Tenagakerja::where('pengajuan_id',$pengajuan->id)->delete();
        $omzet = Omzet::where('pengajuan_id',$pengajuan->id)->delete();
        $manfaat = Manfaat::where('pengajuan_id',$pengajuan->id)->delete();

        // dd($request);

        $dtpjb =([
            'nm'        =>   $request->nm_pjb,
            'jk'        =>   $request->gender,
            'tpt_lhr'   =>   $request->tpt_lhr,
            'tgl_lhr'   =>   $request->tgl_lhr,
            'hub'       =>   $request->hub,
            'almt'      =>   $request->almt,
            'no_hp'     =>   $request->no_hp,
            'no_ktp'    =>   $request->no_ktp,
            'tgl_ktp'   =>   $request->tgl_ktp,
            'kursus'    =>   $request->kursus,
            'pddk'      =>   $request->pddk,
            'jbt'       =>   $request->jbt, 
        ]);
        $pjb->update($dtpjb);

        if  ($request->hasFile('foto')){
            if($request->oldfoto){
                Storage::delete($request->oldfoto);
            }
            $file           =   $request->file('foto');
            $foto['foto']       =   time().str_replace(" ", "", $file->getClientOriginalName() );
            $tujuanpath= public_path('/storage/dokumen');
            $img =\Image::make($file->path());
            
            $img->resize(800,800,function($constraint){
                $constraint->aspectRatio();
            })->save($tujuanpath.'/'.$foto['foto']  );

        } else {
            $foto['foto'] = $request->oldfoto;
        }
        $pjb->update($foto);

        if  ($request->hasFile('scanktp')){
            if($request->oldscanktp){
                Storage::delete($request->oldscanktp);
            }
            $file           =   $request->file('scanktp');
            $scanktp['scanktp']        =   time().str_replace(" ", "", $file->getClientOriginalName() );
            $tujuanpath= public_path('/storage/dokumen');
            $img =\Image::make($file->path());
            
            $img->resize(800,800,function($constraint){
                $constraint->aspectRatio();
            })->save($tujuanpath.'/'.$scanktp['scanktp']   );
        } else {
            $scanktp['scanktp'] = $request->oldscanktp;
        }
        
        $pjb->update($scanktp);
        
        $dtaset = ([
            'tanah'     => str_replace(",", "", $request->tanah), 
            'bangunan'  => str_replace(",", "", $request->bangunan), 
            'persediaan'=> str_replace(",", "", $request->persediaan), 
            'alat'      => str_replace(",", "", $request->alat), 
            'kas'       => str_replace(",", "", $request->kas), 
            'piutang'   => str_replace(",", "", $request->piutang), 
            'peralatan' => str_replace(",", "", $request->peralatan), 
            'totaset'   => str_replace(",", "", $request->totaset), 
        ]);

        $aset->update($dtaset);

        $dtop = ([
            'transport'=> str_replace(",", "", $request->transport),  
            'listrik'  => str_replace(",", "", $request->listrik),  
            'telpon'   => str_replace(",", "", $request->telp),  
            'atk'      => str_replace(",", "", $request->atk),  
            'lain'     => str_replace(",", "", $request->lain),  
            'totop'    => str_replace(",", "", $request->totop), 
        ]);
        $oprasional->update($dtop);

        $dtpengajuan = ([
            'modal'       => str_replace(",", "", $request->modal),  
            'investasi'   => str_replace(",", "", $request->invest),  
            'bsr_pinjaman'=> str_replace(",", "", $request->bsr_pjm),  
        ]);
        $pengajuan->update($dtpengajuan); 

        if  ($request->hasFile('bkt_serius')){
            if($request->oldbktserius){
                Storage::delete($request->oldbktserius);
            }
                $file           =   $request->file('bkt_serius');
                $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
                $file           ->  move('storage/dokumen',$namafile);
                $bkt['bkt_keseriusan'] = $namafile;
        }else{
            $bkt['bkt_keseriusan'] = $request->oldbktserius;
        }
        $pengajuan->update($bkt);

        if  ($request->hasFile( 'kk')){
            if($request->oldkk){
                Storage::delete($request->oldkk);
            }
            $file           =   $request->file('kk');
            $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
            $file           ->  move('storage/dokumen',$namafile);
            $kk['kk'] = $namafile;
        }else{
            $kk['kk'] = $request->oldkk;
        }
        $pengajuan->update($kk);

        if  ($request->hasFile( 'foto_kegiatan')){
            if($request->oldftkegt){
                Storage::delete($request->oldftkegt);
            }
            $file           =   $request->file('foto_kegiatan');
            $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
            $file           ->  move('storage/dokumen',$namafile);
            $ftkegiatan['foto_kegiatan'] = $namafile;
        }else{
            $ftkegiatan['foto_kegiatan'] = $request->oldftkegt;
        }
        $pengajuan->update($ftkegiatan);

        if  ($request->hasFile( 'surat_ush')){
            if($request->oldsrtush){
                Storage::delete($request->oldsrtush);
            }
            $file           =   $request->file('surat_ush');
            $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
            $file           ->  move('storage/dokumen',$namafile);
            $srtush['surat_ush_rt'] = $namafile;
        }else{
            $srtush['surat_ush_rt'] = $request->oldsrtush;
        }
        $pengajuan->update($srtush);
        
        if  ($request->hasFile( 'srt_blmbina')){
            if($request->oldbumn){
                Storage::delete($request->oldbumn);
            }
            $file           =   $request->file('srt_blmbina');
            $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
            $file           ->  move('storage/dokumen',$namafile);
            $blmbina['surat_blmbina'] = $namafile;
        }else{
            $blmbina['surat_blmbina'] = $request->oldbumn;
        }
        $pengajuan->update($blmbina);

        if  ($request->hasFile('srt_pjb')){
            if($request->oldpjb){
                Storage::delete($request->oldpjb);
            }
            $file           =   $request->file('srt_pjb');
            $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
            $file           ->  move('storage/dokumen',$namafile);
            $srtpjb['surat_pj'] = $namafile;
        }else{
            $srtpjb['surat_pj'] = $request->oldpjb;
        }
        $pengajuan->update($srtpjb);

        if  ($request->hasFile('srt_ksglns')){
            if($request->oldlunas){
                Storage::delete($request->oldlunas);
            }
            $file           =   $request->file('srt_ksglns');
            $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
            $file           ->  move('storage/dokumen',$namafile);
            $ksgp['surat_ksglns'] = $namafile;
        }else{
            $ksgp['surat_ksglns'] = $request->oldlunas;
        }
        $pengajuan->update($ksgp);
        
        $nm_brg     = $request->nm_brg ;
        $hrg_satuan = $request->hrg_satuan ;
        $jmlh       = $request->jmlh ; 
        
        for ($no =0 ; $no< count($nm_brg) ; $no++){
            $alat = new Alat;
            $alat->pengajuan_id =   $pengajuan->id;
            $alat->nm_brg       =   $nm_brg[$no];
            $alat->hrg_satuan   =   str_replace(",", "", $hrg_satuan[$no]);
            $alat->jmlh         =   str_replace(",", "", $jmlh[$no]);
            $alat->save();
        }
        
        $nmkry     = $request->nmkry;
        $jbtkry    = $request->jbtkry;
        $gaji      = $request->gaji;
        $pengajuan_id = $pengajuan->id;

        for ($no =0 ; $no< count($nmkry) ; $no++ ) { 
            $tenagakerja = new Tenagakerja;
            $tenagakerja->pengajuan_id = $pengajuan->id;
            $tenagakerja->nm_tngk      = $nmkry[$no];
            $tenagakerja->jbt          = $jbtkry[$no];
            $tenagakerja->gaji         = str_replace(",", "", $gaji[$no]);
            $tenagakerja->save();
        }
        
        $nmomzet    = $request->nmomzet;
        $hrgomzet   = $request->hrgomzet;
        $jmlhomzet  = $request->jmlhomzet;

        for ($no =0 ; $no<count($nmomzet) ; $no++ ) { 
            $omzet = new Omzet;
            $omzet->pengajuan_id    =   $pengajuan->id;
            $omzet->nm_brg          =   $nmomzet[$no];
            $omzet->hrg_satuan      =   str_replace(",", "", $hrgomzet[$no]);
            $omzet->jmlh            =   str_replace(",", "", $jmlhomzet[$no]);
            $omzet->save();
        }

        $faat = $request->manfaat;
        for ($no = 0 ; $no<count($faat) ; $no++ ) { 
            $manfaat = new Manfaat;
            $manfaat->pengajuan_id =    $pengajuan->id;
            $manfaat->manfaat      =    $faat[$no];
            $manfaat->save();
        }
        return redirect('/pengajuan')->with ('success','  Data Berhasil di Perbarui ');
    }

    public function survei($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $pengajuan = Pengajuan::find($id);
        $pdf = PDF::loadview('dashboard.pengajuan.dokumen.form_survei',compact('pengajuan','user'))
                ->setOptions(['defaultFont'=>'sans-serif']);

        return $pdf->setPaper('a4','potrait')->stream('form_survei.pdf');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengajuan  = Pengajuan::find($id);
        $alat       = Alat::where('pengajuan_id',$pengajuan->id);
        $tenaga     = Tenagakerja::where('pengajuan_id',$pengajuan->id);
        $omzet      = Omzet::where('pengajuan_id',$pengajuan->id);
        $manfaat      = Manfaat::where('pengajuan_id',$pengajuan->id);
        $pjb      = Pjb::where('id',$pengajuan->pjb_id);
        $aset     = Aset::where('id',$pengajuan->aset_id);
        $op      = Oprasional::where('id',$pengajuan->oprasional_id);
        $kp     = Kartu_piutang::where('pengajuan_id',$pengajuan->id);


        $pengajuan->delete();
        $alat->delete();
        $tenaga->delete();   
        $omzet->delete();   
        $manfaat->delete();
        $pjb->delete();
        $aset->delete();
        $op->delete();
        $kp->delete();

        return redirect('/pengajuan')->with('success','Data berhasil di hapus');
    }

      // BUKTI KESERIUSAN
    public function buktiserius($id){
        $pengajuan  = Pengajuan::find($id);
        return view('dashboard.pengajuan.dokumen.buktiserius',compact('pengajuan'));
    }

    // SCAN KK
    public function scan_kk($id){
        $pengajuan  = Pengajuan::find($id);
        return view('dashboard.pengajuan.dokumen.scankk',compact('pengajuan'));
    }

    // SURAT KETERANGAN DARI RT
    public function ket_berusaha($id){
        $pengajuan  = Pengajuan::find($id);
        return view('dashboard.pengajuan.dokumen.berusaha',compact('pengajuan'));
    }

    // SURAT BELUM DIBINA BUMN
    public function bumn($id){
        $pengajuan  = Pengajuan::find($id);
        return view('dashboard.pengajuan.dokumen.bumn',compact('pengajuan'));
    }

     // SURAT PENANGUNGG JAWAB BERIKUTNYA
    public function pjb($id){
        $pengajuan  = Pengajuan::find($id);
        return view('dashboard.pengajuan.dokumen.pjb',compact('pengajuan'));
    }
    
    // SURAT KESANGGUPAN MEUNASI
    public function kesanggupan($id){
        $pengajuan  = Pengajuan::find($id);
        return view('dashboard.pengajuan.dokumen.kesanggupan',compact('pengajuan'));
    }

    //Konfirmasi pengajuan
    public function konfirmasi(Request $request , $id){
        $pengajuan1  = Pengajuan::find($id);

        if ($request->status == "lulus_survei"){
            $status = ([
                'status' => $request->status,
                'ket' => $request->ket,
                'ksg_bayar' => str_replace(",", "",$request->ksg_bayar),
                'bsr_usulan' => str_replace(",", "",$request->bsr_usulan)
            ]);
            $pengajuan1->update($status);

        } elseif ($request->status == "lulus"){
            $status = ([
                'status' => $request->status,
                'ket' => $request->ket,
            ]);
            $pengajuan1->update($status);

            if( $request->bsrpemin != NULL ) {
                $kp = Kartu_piutang::where('pengajuan_id',$pengajuan1->id);
                $kp = new Kartu_piutang;
                $kp->pengajuan_id = $pengajuan1->id;
                $kp->pinjaman = str_replace(",", "",$request->bsrpemin);
                $kp->save();
            }

        } elseif  ($request->status == "tidak") {
            $status = ([
                'status' => $request->status,
                'ket' => $request->ket,
            ]);
            $pengajuan1->update($status);
        }
        
        $mitra = $pengajuan1->data_mitra;
        $mitra->notify(new PengajuanKonfirmasiNotification($pengajuan1));
        Mail::to($pengajuan1->user->email)->send(new PengajuanKonfirmasiSendingEmail($pengajuan1));

        return redirect()->back()->with('flash_message_success','Data berhasil di perbarui'); 
    }

    //Konfirmasi pengajuan lunas
    function lunas(Request $request ,$id)
    {
        try{
            
            $pengajuan1= Pengajuan::find($id);
            $lunas = ([
                'status' => "lunas",
                'ket' => "Terimakasih sudah melunaskan peminjaman."
            ]) ;
            $pengajuan1->update($lunas);

            $mitra = $pengajuan1->data_mitra;
            $mitra->notify(new PengajuanLunasNotification($pengajuan1));
            Mail::to($pengajuan1->user->email)->send(new PengajuanLunasSendingEmail($pengajuan1));
            \Session::flash('success', 'Data berhasil diperbarui.');
                
        } catch( \Excaption $e) {
            \Session::flash('gagal', $e->getMessage());
        } 
        return redirect()->back();

    }

    public function download(){
        $user = User::where('id', Auth::user()->id)->first();
        $pdf = PDF::loadView('dashboard.pengajuan.frmt_srt.blm_dibina_bumn',compact('user'));
        return $pdf->download('surat-belum-dibina-bumn.pdf');
    }

    public function download_frmtpjb(){
        $user = User::where('id', Auth::user()->id)->first();
        $pdf = PDF::loadView('dashboard.pengajuan.frmt_srt.pjb',compact('user'));
        return $pdf->download('surat-penanggungjawab-berikutnya.pdf');
    }
    public function download_frmtmelunasi(){
        $user = User::where('id', Auth::user()->id)->first();
        $pdf = PDF::loadView('dashboard.pengajuan.frmt_srt.menulasi',compact('user'));
        return $pdf->download('surat-kesanggupan-melunasi.pdf');
    }
}

