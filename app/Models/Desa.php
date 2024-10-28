<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    public $timestamp = true;

    public $fillable = ['nama_desa', 'kode_wilayah', 'id_kecamatan'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }

    // public function profilLurah()
    // {
    //     return $this->hasOne(ProfilLurah::class, 'id_desa');
    // }
}
