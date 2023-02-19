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
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\file;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $ket = Pengajuan::select('ket')->first();
        // halamaan  user
        if($user->is_admin ==0 )
        {
            $mitra     = Data_Mitra::where('user_id',$user->id)->first();
            $ush       = Data_Ush::where('user_id',$user->id)->first();
            $pengajuan = Pengajuan::where('data_mitra_id',$mitra->id)->get();
            $last      = DB::table('pengajuans')
                        ->where('user_id',$user->id)
                        ->latest('id')->first();
            return view('dashboard.pengajuan.index' ,compact('pengajuan','user','last','mitra','ush','ket') );
        }else{
            $pengajuan1 = Pengajuan::orderByDesc('id')->get();
            return view('dashboard.pengajuan.index' ,compact('pengajuan1','user','ket') );
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
        $last      = DB::table('pengajuans')->latest('id')->first();
        return view('dashboard.pengajuan.create',compact('mitra','ush','user','last') );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $user      = User::where('id', Auth::user()->id)->first();
        $mitra     = Data_Mitra::where('user_id',$user->id)->first();

        $validateData = \Validator::make($request->all(),[
            // pjb
            'nm_pjb'    => 'required|max:255',
            'tpt_lhr'   => 'required',
            'tgl_lhr'   => 'required',
            'hub'       => 'required',
            'gender'    => 'required',
            'almt'      => 'required',
            'no_hp'     => 'required|numeric',
            'no_ktp'    => 'required|numeric',
            'tgl_ktp'   => 'required|date',
            'pddk'      => 'required',
            'jbt'       => 'required | alpha', 
            'foto'      => 'required | image | file',
            'scanktp'   => 'required | image | file',

            'tanah'     => 'required |numeric',
            'bangunan'  => 'required |numeric',
            'persediaan'=> 'required |numeric',
            'peralatan' => 'required |numeric',
            'kas'       => 'required |numeric',
            'piutang'   => 'required |numeric',
            'alat'      => 'required |numeric',
            'totaset'   => 'required |numeric',

            'transport' => 'required |numeric',
            'listrik'   => 'required |numeric',
            'telp'      => 'required |numeric',
            'atk'       => 'required |numeric',
            'lain'      => 'required |numeric',
            'totop'     => 'required |numeric',

            'modal'     => 'required |numeric',
            'invest'    => 'required |numeric',
            'bsr_pjm'   => 'required |numeric',

            'bkt_serius'    => 'required',
            'kk'            => 'required',
            'foto_kegiatan' => 'required',
            'surat_ush'     => 'required',
            'srt_blmbina'   => 'required',
            'srt_pjb'       => 'required',
            'srt_ksglns'    => 'required',
        ]);
        if (!$validateData->passes()) {
            return response()->json(['code'=>0,'error'=>$validateData->errors()->toArray()]);
        } else {
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
                $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
                $file           ->  move('storage/dokumen',$namafile);
                $pjb['foto']    = $namafile;
            }
    
            if  ($request->file('scanktp')){
                $file           =   $request->file('scanktp');
                $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
                $file           ->  move('storage/dokumen',$namafile);
                $pjb['scanktp'] = $namafile;
            }
                
            $pjb->save();
    
            $aset = new Aset;
            $aset->tanah           = $request->tanah; 
            $aset->bangunan        = $request->bangunan; 
            $aset->persediaan      = $request->persediaan; 
            $aset->alat            = $request->alat; 
            $aset->kas             = $request->kas; 
            $aset->piutang         = $request->piutang; 
            $aset->peralatan       = $request->peralatan; 
            $aset->totaset         = $request->totaset; 
            $aset->save();
    
            $oprasional = new Oprasional;
            $oprasional->transport = $request->transport; 
            $oprasional->listrik   = $request->listrik; 
            $oprasional->telpon    = $request->telp; 
            $oprasional->atk       = $request->atk; 
            $oprasional->lain      = $request->lain; 
            $oprasional->totop     = $request->totop; 
            $oprasional->save();
    
            $pengajuan = new Pengajuan;
            $pengajuan->user_id         = $user->id;
            $pengajuan->data_mitra_id   = $mitra->id;
            $pengajuan->pjb_id          = $pjb->id;
            $pengajuan->aset_id         = $aset->id;
            $pengajuan->oprasional_id   = $oprasional->id;
    
            $pengajuan->modal        = $request->modal; 
            $pengajuan->investasi    = $request->invest; 
            $pengajuan->bsr_pinjaman = $request->bsr_pjm; 
    
            if  ($request->file( 'bkt_serius')){
                $file           =   $request->file('bkt_serius');
                $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
                $file           ->  move('storage/dokumen',$namafile);
                $pengajuan['bkt_keseriusan'] = $namafile;
            }
    
            if  ($request->file( 'kk')){
                $file           =   $request->file('kk');
                $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
                $file           ->  move('storage/dokumen',$namafile);
                $pengajuan['kk'] = $namafile;
            }
    
            if  ($request->file( 'foto_kegiatan')){
                $file           =   $request->file('foto_kegiatan');
                $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
                $file           ->  move('storage/dokumen',$namafile);
                $pengajuan['foto_kegiatan'] = $namafile;
            }
    
            if  ($request->file( 'surat_ush')){
                $file           =   $request->file('surat_ush');
                $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
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
                $alat->hrg_satuan   =   $hrg_satuan[$no];
                $alat->jmlh         =   $jmlh[$no];
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
                $tenagakerja->gaji         = $gaji[$no];
                $tenagakerja->save();
            }
            
            $nmomzet    = $request->nmomzet;
            $hrgomzet   = $request->hrgomzet;
            $jmlhomzet  = $request->jmlhomzet;
    
            for ($no =0 ; $no<count($nmomzet) ; $no++ ) { 
                $omzet = new Omzet;
                $omzet->pengajuan_id    =   $pengajuan->id;
                $omzet->nm_brg          =   $nmomzet[$no];
                $omzet->hrg_satuan      =   $hrgomzet[$no];
                $omzet->jmlh            =   $jmlhomzet[$no];
                $omzet->save();
            }
    
            $faat = $request->manfaat;
            for ($no = 0 ; $no<count($faat) ; $no++ ) { 
                $manfaat = new Manfaat;
                $manfaat->pengajuan_id =    $pengajuan->id;
                $manfaat->manfaat      =    $faat[$no];
                $manfaat->save();
            }
            
            return redirect('/pengajuan')->with('success','Pengajuan berhasil ditambahkan  ');
            // return response()->json(['error'=>$validateData->errors()->all()]);
        }

    }

    public function show($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
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
    
    // Public function updatemodal(Request $request, $id )

    // {
    //     $pengajuan1  = Pengajuan::find($id);
    //     $status =([
    //         'status' => $request->status,
    //         'ket'=> $request->ket,
    //     ]);
    //     $pengajuan1->update($status);
        
    // }
    
    public function update(Request $request, $id)
    {
        $pengajuan  = Pengajuan::find($id);
        $pengajuan1 = Pengajuan::where('id',$pengajuan->id);
        $pjb = Pjb::where('id',$pengajuan->pjb_id);
        $aset = Aset::where('id',$pengajuan->aset_id);
        $oprasional = Oprasional::where('id',$pengajuan->oprasional_id);
        $alat = Alat::where('pengajuan_id',$pengajuan->id)->delete();
        $tenagakerja =  Tenagakerja::where('pengajuan_id',$pengajuan->id)->delete();
        $omzet = Omzet::where('pengajuan_id',$pengajuan->id)->delete();
        $manfaat = Manfaat::where('pengajuan_id',$pengajuan->id)->delete();

        $validateData = $request->validate([
            // pjb
            'nm_pjb'    => 'required|max:255',
            'tpt_lhr'   => 'required',
            'tgl_lhr'   => 'required',
            'hub'       => 'required',
            'gender'    => 'required',
            'almt'      => 'required',
            'no_hp'     => 'required|numeric',
            'no_ktp'    => 'required|numeric',
            'tgl_ktp'   => 'required|date',
            'pddk'      => 'required',
            'jbt'       => 'required | alpha', 

            'tanah'     => 'required |numeric',
            'bangunan'  => 'required |numeric',
            'persediaan'=> 'required |numeric',
            'peralatan' => 'required |numeric',
            'kas'       => 'required |numeric',
            'piutang'   => 'required |numeric',
            'alat'      => 'required |numeric',
            'totaset'   => 'required |numeric',

            'transport' => 'required |numeric',
            'listrik'   => 'required |numeric',
            'telp'      => 'required |numeric',
            'atk'       => 'required |numeric',
            'lain'      => 'required |numeric',
            'totop'     => 'required |numeric',

            'modal'     => 'required |numeric',
            'invest'    => 'required |numeric',
            'bsr_pjm'   => 'required |numeric',
        ]);

        $dtpjb =([
            'nm'        =>   $validateData['nm_pjb'],
            'jk'        =>   $validateData['gender'],
            'tpt_lhr'   =>   $validateData['tpt_lhr'],
            'tgl_lhr'   =>   $validateData['tgl_lhr'],
            'hub'       =>   $validateData['hub'],
            'almt'      =>   $validateData['almt'],
            'no_hp'     =>   $validateData['no_hp'],
            'no_ktp'    =>   $validateData['no_ktp'],
            'tgl_ktp'   =>   $validateData['tgl_ktp'],
            'kursus'    =>   $request->kursus,
            'pddk'      =>   $validateData['pddk'],
            'jbt'       =>   $validateData['jbt'], 
        ]);
        $pjb->update($dtpjb);

        if  ($request->hasFile('foto')){
            if($request->oldfoto){
                Storage::delete($request->oldfoto);
            }
            $file           =   $request->file('foto');
            $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
            $file           ->  move('storage/dokumen',$namafile);
            $foto['foto']    = $namafile;
        } else {
            $foto['foto'] = $request->oldfoto;
        }
        $pjb->update($foto);

        if  ($request->hasFile('scanktp')){
            if($request->oldscanktp){
                Storage::delete($request->oldscanktp);
            }
            $file           =   $request->file('scanktp');
            $namafile       =   time().str_replace(" ", "", $file->getClientOriginalName() );
            $file           ->  move('storage/dokumen',$namafile);
            $scanktp['scanktp'] = $namafile;
        } else {
            $scanktp['scanktp'] = $request->oldscanktp;
        }
        
        $pjb->update($scanktp);
        
        $dtaset = ([
            'tanah'     => $validateData['tanah'], 
            'bangunan'  => $validateData['bangunan'], 
            'persediaan'=> $validateData['persediaan'], 
            'alat'      => $validateData['alat'], 
            'kas'       => $validateData['kas'], 
            'piutang'   => $validateData['piutang'], 
            'peralatan' => $validateData['peralatan'], 
            'totaset'   => $validateData['totaset'], 
        ]);

        $aset->update($dtaset);

        $dtop = ([
            'transport'=> $validateData['transport'],  
            'listrik'  => $validateData['listrik'],  
            'telpon'   => $validateData['telp'],  
            'atk'      => $validateData['atk'],  
            'lain'     => $validateData['lain'],  
            'totop'    => $validateData['totop'], 
        ]);
        $oprasional->update($dtop);

        $dtpengajuan = ([
            'modal'       => $validateData['modal'],  
            'investasi'   => $validateData['invest'],  
            'bsr_pinjaman'=> $validateData['bsr_pjm'],  
        ]);
        $pengajuan1->update($dtpengajuan); 

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
            $alat->hrg_satuan   =   $hrg_satuan[$no];
            $alat->jmlh         =   $jmlh[$no];
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
            $tenagakerja->gaji         = $gaji[$no];
            $tenagakerja->save();
        }
        
        $nmomzet    = $request->nmomzet;
        $hrgomzet   = $request->hrgomzet;
        $jmlhomzet  = $request->jmlhomzet;

        for ($no =0 ; $no<count($nmomzet) ; $no++ ) { 
            $omzet = new Omzet;
            $omzet->pengajuan_id    =   $pengajuan->id;
            $omzet->nm_brg          =   $nmomzet[$no];
            $omzet->hrg_satuan      =   $hrgomzet[$no];
            $omzet->jmlh            =   $jmlhomzet[$no];
            $omzet->save();
        }

        $faat = $request->manfaat;
        for ($no = 0 ; $no<count($faat) ; $no++ ) { 
            $manfaat = new Manfaat;
            $manfaat->pengajuan_id =    $pengajuan->id;
            $manfaat->manfaat      =    $faat[$no];
            $manfaat->save();
        }
        //$request->session()->flash('success',' Data Berhasil di perbarui ');
        return redirect('/pengajuan')->with ('success','  Data Berhasil di perbarui ');
            
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

        $pengajuan->delete();
        $alat->delete();
        $tenaga->delete();   
        $omzet->delete();   
        $manfaat->delete();
        $pjb->delete();
        $aset->delete();
        $op->delete();

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
        $status = ([
            'status' => $request->status,
            'ket' => $request->ket,
        ]);
        $pengajuan1->update($status);
        if( $request->bsrpemin != NULL ) {
            $kp = Kartu_piutang::where('pengajuan_id',$pengajuan1->id);
            $kp = new Kartu_piutang;
            $kp->pengajuan_id = $pengajuan1->id;
            $kp->pinjaman = $request->bsrpemin;
            $kp->save();
            return redirect()->back()->with('flash_message_success','Data berhasil di perbarui'); 
        }
        return redirect()->back()->with('flash_message_success','Data berhasil di perbarui'); 
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

