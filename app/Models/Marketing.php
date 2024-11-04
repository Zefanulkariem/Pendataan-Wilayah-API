<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    use HasFactory;
    public $timestamps = true;

    public $fillable = ['bulan', 'tahun', 'targetTahunan', 'targetBulanan'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
