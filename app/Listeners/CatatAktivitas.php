<?php

namespace App\Listeners;

use App\Events\AktivitasTerjadi;
use App\Models\Logaktivitas;

class CatatAktivitas
{
    /**
     * Handle the event.
     */
    public function handle(AktivitasTerjadi $event): void
    {
        LogAktivitas::create([
            'id_user' => $event->id_user,
            'role' => $event->role,
            'aktivitas' => $event->aktivitas,
            'deskripsi' => $event->deskripsi,
        ]);
    }
}
