<?php

namespace App\Models;

use App\Models\Pengajuan;
use Illuminate\Support\Carbon;
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
    public function getCreatedAtAttribute($value)
    {
        // return Carbon::parse($value)->format('D, Y-m-d ');
        return Carbon::parse($this->attributes['tgl_lhr'])
            ->translatedFormat('l, d F Y');
    }
}
