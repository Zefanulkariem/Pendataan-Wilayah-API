<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelakuUmkm extends Model
{
    use HasFactory;
    
    public $fillable = ['nama_umkm', 'id_jenis_umkm', 'pemilik_umkm', 'no_telp', 'id_desa'];

    public function pendanaanUmkm()
    {
        return $this->hasMany(PendanaanUmkm::class, 'id_pelaku_umkm');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
    
    public function jenisUmkm()
    {
        return $this->belongsTo(JenisUmkm::class, 'id_jenis_umkm');
    }

}
