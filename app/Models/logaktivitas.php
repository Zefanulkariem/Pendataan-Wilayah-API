<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAktivitas extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'logaktivitas';

    // Fillable properties
    protected $fillable = [
        'id_user',
        'role',
        'tanggal',
        'aktivitas',
    ];

    /**
     * Relasi ke model User (foreign key id_user).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Pastikan role yang diberikan valid sebelum disimpan.
     */
    public function setRoleAttribute($value)
    {
        $validRoles = ['admin', 'UMKM', 'investor'];
        if (!in_array($value, $validRoles)) {
            throw new \InvalidArgumentException('Invalid role');
        }

        $this->attributes['role'] = $value;
    }

    /**
     * Getter untuk format tanggal yang lebih rapi.
     */
    public function getTanggalAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * Setter untuk memastikan format tanggal saat disimpan.
     */
    public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal'] = \Carbon\Carbon::parse($value)->format('Y-m-d');
    }
}