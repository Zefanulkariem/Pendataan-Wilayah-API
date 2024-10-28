<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelengkapanLegalitasUsaha extends Model
{
    use HasFactory;
    public $timestamp = true;

    public $fillable = ['badan_usaha', 'akta_pendirian', 'NIB', 'SKDP', 'NPWP', 'SIUP', 'TDP'];
}
