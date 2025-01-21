<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['id_umkm','tanggal','income','outcome','profit_loss', 'status_verifikasi'];

    public function user() {
        return $this->belongsTo(User::class, 'id_umkm'); //ngatur relasi user ke id_umkm
    }

    public function buktiTransaksi() {
        return $this->hasMany(BuktiTransaksi::class);
    }

}
