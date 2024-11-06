<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiUmkm extends Model {
    use HasFactory;

    protected $guarded = [];
    public $timestamp = true;

    public $fillable = ['id_user', 'nama_umkm', 'slug', 'koordinat', 'deskripsi', 'image', 'id_desa', 'id_jenis_umkm'];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
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
