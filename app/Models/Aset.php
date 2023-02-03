<?php

namespace App\Models;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasFormatRupiah; 

class Aset extends Model
{
    use HasFactory;
    use HasFormatRupiah; 

    protected $fillable = [
        'tanah',
        'bangunan',
        'persediaan',
        'alat',
        'kas',
        'piutang',
        'peralatan',
        'totaset',
        'created_at',
        'updated_at',
    ];

    public function pengajuan(){
        return $this->hasOne(Pengajuan::class);
    }

}
