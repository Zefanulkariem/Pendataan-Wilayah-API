<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logaktivitas extends Model
{
    protected $fillable = [
        'id_user',
        'role',
        'aktivitas',
        'deskripsi',
    ];
  
    public $timestamps = true;

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
