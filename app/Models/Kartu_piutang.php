<?php

namespace App\Models;


use App\Models\Pengajuan;
use App\Models\Pembayaran;
use Illuminate\Support\Carbon;
use App\Traits\HasFormatRupiah; 
use App\Models\Detail_Kartupiutang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kartu_piutang extends Model
{
    use HasFactory, HasFormatRupiah, Notifiable;

    public function pengajuan(){
        return $this->belongsTo(Pengajuan::class);
    }
    public function pembayaran(){
        return $this->hasMany(Pembayaran::class);
    }

    public function detailkartupiutang(){
        return $this->hasOne(Detail_Kartupiutang::class);
    }

    protected $fillable = [
        'tgl_penyaluran',
        'pinjaman',
        'no_kontrak',
        'sb_thn',
        'sb_bln',
        'thn',
        'bln',
        'waktu',
        'jmlhpokok',
        'jmlhjasa',
        'totkp',
    ];
    
    
    public function getCreatedAtAttribute($value)
    {
        // return Carbon::parse($value)->format('D, d-m-Y ');
        return Carbon::parse($this->attributes['tgl_penyaluran'])
            ->translatedFormat('l, d F Y');
    }

}
