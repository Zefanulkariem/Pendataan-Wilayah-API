<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['id_umkm','bulan','tahun','income','outcome','profit_loss','status'];

    public function user() {
        return $this->belongsTo(User::class);
    }


}
