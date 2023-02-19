<?php

namespace App\Models;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pjb extends Model
{
    use HasFactory;

    protected $fillable = [
        'nm',
        'jk',
        'tpt_lhr',
        'tgl_lhr',
        'hub',
        'almt',
        'pekerjaan',
        'bangsa',
        'no_hp',
        'no_ktp',
        'tgl_ktp',
        'foto',
        'scanktp',
        'kursus',
        'pddk',
        'jbt',       
    ];
    
    public function pengajuan(){
        return $this->hasOne(Pengajuan::class);
    }
}
