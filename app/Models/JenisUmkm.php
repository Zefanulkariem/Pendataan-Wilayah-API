<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUmkm extends Model
{
    use HasFactory;
    public $timestamp = true;
    
    public $fillable = ['jenis_umkm'];

    public function jenisUmkm()
    {
        return $this->hasMany(JenisUmkm::class, 'id_jenis_umkm');
    }

    public function lokasi_umkm()
    {
        return $this->hasMany(LokasiUmkm::class, 'id_jenis_umkm');
    }

}
