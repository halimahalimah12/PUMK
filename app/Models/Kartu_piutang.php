<?php

namespace App\Models;


use App\Models\Pengajuan;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasFormatRupiah; 
use Illuminate\Notifications\Notifiable;

class Kartu_piutang extends Model
{
    use HasFactory, HasFormatRupiah, Notifiable;

    public function pengajuan(){
        return $this->belongsTo(Pengajuan::class);
    }
    public function pembayaran(){
        return $this->hasMany(Pembayaran::class);
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
        'jasa',
    ];
    
    
    public function getCreatedAtAttribute($value)
    {
        // return Carbon::parse($value)->format('D, d-m-Y ');
        return Carbon::parse($this->attributes['tgl_penyaluran'])
            ->translatedFormat('l, d F Y');
    }

}
