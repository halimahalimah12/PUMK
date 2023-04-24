<?php

namespace App\Models;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasFormatRupiah; 
use Illuminate\Notifications\Notifiable;

class Alat extends Model
{
    use HasFactory;
    use HasFormatRupiah, Notifiable; 

    protected $fillable = [
        'pengajuan_id',
        'nm_brg',
        'hrg_satuan',
        'jmlh',
    ];

    public function pengajuan(){
        return $this->belongsToMany(Pengajuan::class);
    }

}
