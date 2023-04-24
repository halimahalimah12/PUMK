<?php

namespace App\Models;

use App\Models\User;
use App\Models\Data_ush;
use App\Models\Pengajuan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Data_mitra extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nm',
        'jk',
        'tpt_lhr',
        'tgl_lhr',
        'sts_prk',
        'almt',
        'pekerjaan',
        'kel',
        'kec',
        'kab',
        'no_hp',
        'no_ktp',
        'tgl_ktp',
        'foto',
        'scanktp',
        'kursus',
        'pddk',
        'jbt',       
    ];

    public function allData(){
        return DB::table('data_user')->get();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function data_ush(){
        return $this->belongsTo(Data_ush::class);
    }

    public function pengajuan(){
        return $this->hasMany(Pengajuan::class);
    }

    public function getCreatedAtAttribute($value)
    {
        // return Carbon::parse($value)->format('D, Y-m-d ');
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y');
    }

}
