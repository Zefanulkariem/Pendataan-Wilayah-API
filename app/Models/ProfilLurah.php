<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilLurah extends Model
{
    use HasFactory;
    public $timestamp = true;

    public $fillable = ['nama_lurah', 'id_desa', 'cover'];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
