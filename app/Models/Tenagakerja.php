<?php

namespace App\Models;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasFormatRupiah; 

class Tenagakerja extends Model
{
    use HasFactory;
    use HasFormatRupiah; 
    
    protected $fillable = [
        'nm_tngk',
        'jbt',
        'gaji',
    ];
    public function pengajuan(){
        return $this->belongsToMany(Pengajuan::class);
    }
}
