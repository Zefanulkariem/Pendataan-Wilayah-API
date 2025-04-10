<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logaktivitas extends Model
{

    protected $fillable = [
        'user_id',
        'role',
        'aktivitas',
        'deskripsi',
        'ip_address',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
