<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiTransaksi extends Model
{
    use HasFactory;

    public $fillable = ['id_keuangan', 'gambar_bukti'];

    public function keuangan()
    {
        return $this->belongsTo(Keuangan::class, 'id_keuangan');
    }
}