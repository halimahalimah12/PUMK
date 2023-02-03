<?php

namespace App\Models;

use App\Models\User;
use App\Models\Proposal;
use App\Models\Kartu_piutang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasFormatRupiah; 

class Pembayaran extends Model
{
    use HasFactory;
    use HasFormatRupiah; 
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function poposal(){
        return $this->belongsTo(Proposal::class);
    }
    public function kartu_piutang(){
        return $this->belongsTo(Kartu_piutang::class);
    }
}
