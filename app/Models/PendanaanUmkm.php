<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendanaanUmkm extends Model
{
    use HasFactory;
    
    public $fillable = ['id_pelaku_umkm', 'id_user', 'jumlah_dana', 'tanggal_pendanaan', 'status_pendanaan'];

    public function pelakuUmkm()
    {
        return $this->belongsTo(PelakuUmkm::class, 'id_pelaku_umkm');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
