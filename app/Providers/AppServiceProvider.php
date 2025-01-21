<?php

namespace App\Providers;

use App\Models\Keuangan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            // Data untuk notifikasi keuangan
            $uangNotification = Keuangan::where('status_verifikasi', 'Menunggu')->get();

            $view->with([
                'uangNotification' => $uangNotification,
            ]);

        });
    }
}
