<?php

namespace App\Models;


use App\Models\Pengajuan;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasFormatRupiah; 

class Kartu_piutang extends Model
{
    use HasFactory;
    use HasFormatRupiah; 

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
        'pokok',
        'jasa',
    ];
    
    protected $casts = [
        'tgl_penyaluran' => 'date',
    ];
}
