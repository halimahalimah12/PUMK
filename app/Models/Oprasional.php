<?php

namespace App\Models;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasFormatRupiah; 

class Oprasional extends Model
{
    use HasFactory;
    use HasFormatRupiah; 

    protected $fillable = [
        
        'transport',
        'listrik',
        'telpon',
        'atk',
        'lain',
        'totop',
        'created_at',
        'updated_at',
    ];

    public function pengajuan(){
        return $this->hasOne(Pengajuan::class);
    }
}
