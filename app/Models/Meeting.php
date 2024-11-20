<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['id_investor', 'id_umkm', 'judul', 'lokasi_meeting', 'tanggal'];

    public function idInvestor()
    {
        return $this->belongsTo(User::class, 'id_investor');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_umkm');
    }
}