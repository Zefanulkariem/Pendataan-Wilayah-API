<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['id_user', 'id_pelaku_umkm', 'lokasi', 'tanggal_meeting'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pelakuumkm()
    {
        return $this->belongsTo(PelakuUmkm::class, 'id_pelaku_umkm');
    }
}
