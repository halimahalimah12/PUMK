<?php

namespace App\Models;


use App\Models\Pengajuan;
use App\Models\Data_mitra;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Data_ush extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_ush',
        'jnsush',
        'sektorush',
        'thn_berdiri',
        'almt_ush',
        'akta_ush',
        'izin_ush',
        'nohp_ush',
        'npwp',
        'tmptush',
        'bank',
        'atsnm',
        'norek',
        'almtbank'
    ];

    public function data_mitra(){
        return $this->hasOne(Data_mitra::class);
        
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        // return Carbon::parse($value)->format('D, Y-m-d ');
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y');
    }

    
}
