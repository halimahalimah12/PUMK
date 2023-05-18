<?php

namespace App\Models;

use App\Models\Kartu_piutang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detail_Kartupiutang extends Model
{
    use HasFactory;

    protected $fillable = [
        'bulan',
        'tahun',
        'pokok',
        'jasa',
        'jumlah',
        'sisasaldo',
        'status',
    ];

    public function kartu_piutang(){
        return $this->belongsToMany(Kartu_piutang::class);
    }
}
