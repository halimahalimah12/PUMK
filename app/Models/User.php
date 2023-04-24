<?php

namespace App\Models;

use App\Models\Survei;
use App\Models\Data_ush;
use App\Models\Pengajuan;
use App\Models\Data_mitra;
use App\Models\Notification;
use App\Models\Pembayaran;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function data_mitra(){
        return $this->hasOne(Data_mitra::class);
    }

    public function data_ush(){
        return $this->hasOne(Data_ush::class);
    }

    public function pengajuan(){
        return $this->hasMany(Pengajuan::class);
    }

    public function pembayaran(){
        return $this->hasMany(Pembayaran::class);
    }
    
    public function notifikasi(){
        return $this->hasOne(Notification::class);
    }
}
