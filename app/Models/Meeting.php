<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['id_investor', 'id_umkm', 'judul', 'lokasi_meeting', 'tanggal', 'status_verifikasi'];

    public function investor()
    {
        return $this->belongsTo(User::class, 'id_investor');
    }

    public function umkm()
    {
        return $this->belongsTo(User::class, 'id_umkm');
    }
}