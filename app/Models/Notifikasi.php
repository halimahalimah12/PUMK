<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notifikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'type',
        'id_tujuan',
        'data',
        'read_at',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
