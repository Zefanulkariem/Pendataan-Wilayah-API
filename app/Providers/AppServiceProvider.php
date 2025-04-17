<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Keuangan; 
use App\Models\Meeting;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Kirim data notifikasi meeting ke semua view
        View::share('meetNotification', Meeting::where('status_verifikasi', 'Menunggu')->get());

        // Notifikasi keuangan
    View::share('keuanganNotification', Keuangan::where('status_verifikasi', 'Menunggu')->get());
    }
    
}
