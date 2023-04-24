<?php

namespace App\Models;
use App\Models\Pjb;

use App\Models\Alat;

use App\Models\Aset;
use App\Models\Omzet;
use App\Models\Manfaat;
use App\Models\Data_mitra;
use App\Models\Oprasional;
use App\Models\Tenagakerja;
use App\Models\Kartu_piutang;
use Illuminate\Support\Carbon;
use App\Traits\HasFormatRupiah;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengajuan extends Model
{
    use HasFactory;
    use HasFormatRupiah; 
    use Notifiable;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function data_mitra(){
        return $this->belongsTo(Data_mitra::class);
    }

    public function pjb(){
        return $this->belongsTo(Pjb::class);
    }

    public function aset(){
        return $this->belongsTo(Aset::class);
    }

    public function oprasional(){
        return $this->belongsTo(Oprasional::class);
    }

    public function alat(){
        return $this->hasOne(Alat::class);
    }

    public function tenagakerja(){
        return $this->hasOne(Tenagakerja::class);
    }

    public function omzet(){
        return $this->hasOne(Omzet::class);
    }

    public function manfaat(){
        return $this->hasOne(Manfaat::class);
    }

    public function kartu_piutang(){
        return $this->hasOne(Kartu_piutang::class);
    }

    public function detaildata($id_pengajuan){
        
        return DB::table('pengajuans')->where('id', $id_pengajuan)->first();
    }

    protected $fillable = [
        'id',
        'user_id',
        'data_mitra_id',
        'pjb_id',
        'aset_id',
        'alat_id',
        'oprasional_id',
        'tenagakerja_id',
        'manfaat_id',
        'omzet_id',
        'status',
        'ket',
        'totalat',
        'totgaji',
        'totomzet',
        'modal',
        'investasi',
        'bsr_pinjaman',
        'ksg_bayar',
        'bsr_usulan',
        'kk',
        'bkt_keseriusan', 
        'surat_blmbina', 
        'surat_pj',
        'surat_ksglns',  
        'surat_ush_rt',  
        'foto_kegiatan',
        'created_at',
        'updated_at',
    ];
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function getCreatedAtAttribute($value)
    {
        // return Carbon::parse($value)->format('D, Y-m-d ');
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y');
    }

}
