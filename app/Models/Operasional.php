<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operasional extends Model
{
    use HasFactory;
    public $timestamps = true;

    public $fillable = ['karyawan', 'jml_karyawan'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}