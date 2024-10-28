<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilCamat extends Model
{
    use HasFactory;
    public $timestamp = true;

    public $fillable = ['nama_camat', 'id_kecamatan', 'cover'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }
}
