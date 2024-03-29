<?php

namespace App\Models;

use App\Models\User;
use App\Models\Proposal;
use App\Models\Kartu_piutang;
use App\Traits\HasFormatRupiah; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Pembayaran extends Model
{
    use HasFactory, HasFormatRupiah, Notifiable;
    protected $fillable = [
        'tgl',
        'kartu_piutang_id',
        'bank',
        'foto',
        'jumlah',
        'pokok',
        'jasa',
        'bulan',
        'status',
        'created_at',
        'updated_at',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function poposal(){
        return $this->belongsTo(Proposal::class);
    }
    public function kartu_piutang(){
        return $this->belongsTo(Kartu_piutang::class);
    }
    
    public function routeNotificationForMail($notification)
    {
        return $this->email;
    }
}
