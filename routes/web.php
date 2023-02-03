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
use App\Http\Controllers\JenisUshController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\KrtpiutangController;



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

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate'] );
Route::post('/logout', [LoginController::class,'logout'] );

Route::get('/register', [RegisController::class,'index'])->middleware('guest');
Route::post('/register', [RegisController::class,'store']);


Route::get('/dashboard', function () {
    $user = User::where('id', Auth::user()->id)->first();
    $mitra = Data_Mitra::where('user_id',$user->id)->first();
    return view('dashboard.index',compact('user','mitra'));
})->middleware('auth');
// 

// Route::post('/pengajuan', [PengajuanController::class,'store'])->middleware('auth');

Route::resource('/pengajuan', PengajuanController::class)->middleware('auth');

Route::match(['get','post'], '/konfirmasi/{id}','PengajuanController@konfirmasi');
Route::put('/konfirmasi/{id}',[PengajuanController::class,'konfirmasi']);


Route::get('/hapus/{id}', [PengajuanController::class,'destroy'])->middleware('auth');


Route::get('/bukti-keseriusan', [PengajuanController::class,'buktiserius'])->middleware('auth');
Route::get('/scan-kk', [PengajuanController::class,'scan_kk'])->middleware('auth');
Route::get('/ket-berusaha', [PengajuanController::class,'ket_berusaha'])->middleware('auth');
Route::get('/surat-belum-dibina-bumn', [PengajuanController::class,'bumn'])->middleware('auth');
Route::get('/surat-penanggung-jawab-berikutnya', [PengajuanController::class,'pjb'])->middleware('auth');
Route::get('/surat-kesanggupan-melunasi', [PengajuanController::class,'kesanggupan'])->middleware('auth');
Route::get('/show/{id}', [PengajuanController::class,'show'])->middleware('auth');
Route::get('/cetak/{id}', [PengajuanController::class,'cetak'])->middleware('auth');
Route::get('/survei/{id}', [PengajuanController::class,'survei'])->middleware('auth');




Route::resource('/datamitra', DtmitraController::class)->middleware('auth');

Route::resource('/kartupiutang', KrtpiutangController::class)->middleware('auth');
// Route::get('/kartupiutang/show/{pengajuan}', [KrtpiutangController::class,'show'])->middleware('auth');


Route::get('/profil', [ProfilController::class,'edit'])->middleware('auth');
Route::post('/profil',[ProfilController::class,'update'])->middleware('auth')->name('profil.update');
Route::get('/foto', [ProfilController::class,'foto'])->middleware('auth');
Route::get('/scanktp', [ProfilController::class,'scanktp'])->middleware('auth');

Route::resource('/jenis_usaha', JenisUshController::class)->except('show')->middleware('admin');