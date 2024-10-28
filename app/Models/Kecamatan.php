<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    public $timestamp = true;

    public $fillable = ['nama_kecamatan'];

    public function desa()
    {
        return $this->hasMany(Desa::class, 'id_kecamatan');
    }
    
    // public function profilCamat()
    // {
    //     return $this->hasOne(ProfilCamat::class, 'id_kecamatan');
    // }
}
