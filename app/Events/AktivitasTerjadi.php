<?php

namespace App\Events;

use App\Models\LogAktivitas;

class AktivitasTerjadi
{
    public $id_user;
    public $role;
    public $aktivitas;
    public $deskripsi;

    /**
     * Create a new event instance.
     */
    public function __construct($id_user, $role, $aktivitas, $deskripsi = null)
    {
        $this->id_user = $id_user;
        $this->role = $role;
        $this->aktivitas = $aktivitas;
        $this->deskripsi = $deskripsi;

        // Langsung catat ke database saat event dibuat
        $this->catatAktivitas();
    }

    protected function catatAktivitas()
    {
        LogAktivitas::create([
            'id_user' => $this->id_user,
            'role' => $this->role,
            'aktivitas' => $this->aktivitas,
            'deskripsi' => $this->deskripsi,
        ]);
    }
}
