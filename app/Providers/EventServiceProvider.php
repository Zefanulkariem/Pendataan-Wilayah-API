<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \App\Events\AktivitasTercatat::class => [
            \App\Listeners\CatatAktivitas::class,
        ],
    ];
    

    public function boot(): void
    {
        //
    }
}
