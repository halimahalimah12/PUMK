<?php

namespace App\Models;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasFormatRupiah; 

class Alat extends Model
{
    use HasFactory;
    use HasFormatRupiah; 

    protected $fillable = [
        'nm_brg',
        'hrg_satuan',
        'jmlh',
    ];

    public function pengajuan(){
        return $this->belongsToMany(Pengajuan::class);
    }

}
