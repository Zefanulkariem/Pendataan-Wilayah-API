<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiUmkm extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pelakuUmkm()
    {
        return $this->belongsTo(PelakuUmkm::class, 'id_pelaku_umkm');
    }
}
