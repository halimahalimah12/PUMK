<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Data_mitra;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DtmitraController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\Pengajuan1Controller;
use App\Http\Controllers\KrtpiutangController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LaporanController;
use Illuminate\Notifications\Notification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
// LOGIN
Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate'] );
Route::post('/logout', [LoginController::class,'logout'] );
// REGISTER
Route::get('/register', [RegisController::class,'index'])->middleware('guest');
Route::post('/register', [RegisController::class,'store']);
//DASHBOARD 
Route::get('/dashboard', function () {
    $user = User::where('id', Auth::user()->id)->first();
    $mitra = Data_Mitra::where('user_id',$user->id)->first();
    
    // if ($user->is_admin  == 1 ){
    //     $notification= Notification::where('id_tujuan','=','1')->get();
    //     $countnotifikasi = Notification::where('id_tujuan','=','1')->count();
    // } else {
    //     $notification= Notification::where('id_tujuan',$user->id)->get();
    //     $countnotifikasi = Notification::where('id_tujuan',$user->id)->count();
    // }
    
    return view('dashboard.index',compact('user','mitra'));
})->middleware('auth');
// PENGAJUAN
Route::resource('/pengajuan', PengajuanController::class)->middleware('auth');
Route::post('/pengajuan/store',[PengajuanController::class,'store'])->middleware('auth');
Route::match(['get','post'], '/konfirmasi/{id}','PengajuanController@konfirmasi');
Route::put('/konfirmasi/{id}',[PengajuanController::class,'konfirmasi']);
Route::get('/hapus/{id}', [PengajuanController::class,'destroy'])->middleware('auth');
Route::get('/show/{id}', [PengajuanController::class,'show'])->middleware('auth');
Route::get('/cetak/{id}', [PengajuanController::class,'cetak'])->middleware('auth');
// DOKUMEN PENGAJUAN
Route::get('/bukti-keseriusan/{id}', [PengajuanController::class,'buktiserius'])->middleware('auth');
Route::get('/scan-kk/{id}', [PengajuanController::class,'scan_kk'])->middleware('auth');
Route::get('/ket-berusaha/{id}', [PengajuanController::class,'ket_berusaha'])->middleware('auth');
Route::get('/surat-belum-dibina-bumn/{id}', [PengajuanController::class,'bumn'])->middleware('auth');
Route::get('/surat-penanggung-jawab-berikutnya/{id}', [PengajuanController::class,'pjb'])->middleware('auth');
Route::get('/surat-kesanggupan-melunasi/{id}', [PengajuanController::class,'kesanggupan'])->middleware('auth');
// SURVEI PENGAJUAN
Route::get('/survei/{id}', [PengajuanController::class,'survei'])->middleware('auth');
// FORMAT SURAT PENGAJUAN
Route::get('/download',[PengajuanController::class,'download'])->middleware('auth');
Route::get('/downloadpjb',[PengajuanController::class,'download_frmtpjb'])->middleware('auth');
Route::get('/download-melunasi',[PengajuanController::class,'download_frmtmelunasi'])->middleware('auth');
// DATA MITRA
Route::resource('/datamitra', DtmitraController::class)->middleware('auth');
// KARTU PIUTANG
Route::resource('/kartupiutang', KrtpiutangController::class)->middleware('auth');
Route::get('/cetak-kartu-piutang/{id}', [KrtpiutangController::class,'cetak'])->middleware('auth');
Route::get('/kartupiutang/hapus/{id}', [KrtpiutangController::class,'destroy'])->middleware('auth');
// PROFIL (DATA MITRA & USAHA)
Route::get('/profil', [ProfilController::class,'edit'])->middleware('auth');
Route::post('/profil',[ProfilController::class,'update'])->middleware('auth')->name('profil.update');
Route::get('/foto', [ProfilController::class,'foto'])->middleware('auth');
Route::get('/scanktp', [ProfilController::class,'scanktp'])->middleware('auth');

//AKUN
Route::get('/akun', [ProfilController::class,'akun'])->middleware('auth');
Route::put('/akun-update', [ProfilController::class,'akun_update'])->middleware('auth');


//PEMBAYARAN
Route::get('/pembayaran', [PembayaranController::class,'index'])->middleware('auth')->name('pembayaran.index');
Route::post('/pembayaran',[PembayaranController::class,'store'])->middleware('auth');
Route::get('/bukti/{id}',[KrtpiutangController::class,'buktipembayaran'])->middleware('auth');
Route::get('/pembayaran/valid/{id}',[PembayaranController::class,'valid'])->middleware('auth');
Route::get('/pembayaran/tidak-valid/{id}',[PembayaranController::class,'tidak_valid'])->middleware('auth');

//LAPORAN
Route::get('/laporan-survei',[LaporanController::class,'index'])->middleware('auth');
Route::get('/laporan-angsuran',[LaporanController::class,'angsuran'])->middleware('auth');
Route::get('/cetak-laporan-survei',[LaporanController::class,'cetak_survei'])->middleware('auth');
Route::get('/cetak-laporan-angsuran',[LaporanController::class,'cetak_angsuran'])->middleware('auth');

