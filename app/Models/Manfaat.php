<?php

namespace App\Models;

use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manfaat extends Model
{
    use HasFactory;
    protected $fillable = [
        'manfaat',
    ];

    public function pengajuan(){
        return $this->belongsToMany(Pengajuan::class);
    }
}
