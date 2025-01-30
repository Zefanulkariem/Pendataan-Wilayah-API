<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisUmkmController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\CentrePointController;
use App\Http\Controllers\LokasiUmkmController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LegalUsahaController;
use App\Http\Controllers\OperasionalController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\MeetingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('tentang');
});

Route::get('/contactus', function () {
    return view('contact');
});

Route::get('/tutorial', function () {
    return view('tutorial');
});

Auth::routes(
    ['register' => false],
);

Route::fallback(function () {
    return view('errors.404'); //kostum 404
});

// superadmin
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'can:view_masterAdmin'], 'as' => 'Master Admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile.index');
    
    Route::get('/keuangan/menu', [KeuanganController::class, 'menu'])->name('keuangan.menu');
    Route::get('/keuangan/menu/show/{id}', [KeuanganController::class, 'show'])->name('keuangan.show');
    Route::get('/keuangan/notifications', [KeuanganController::class, 'getNotifications'])->name('uang.notification');
    Route::put('/keuangan/approve/{id}', [KeuanganController::class, 'approve'])->name('keuangan.approve');
    Route::put('/keuangan/reject/{id}', [KeuanganController::class, 'reject'])->name('keuangan.reject');
    
    Route::get('/cek-legal/menu', [LegalUsahaController::class, 'menu'])->name('legalUsaha.menu');
    Route::get('/cek-legal/menu/show/{id}', [LegalUsahaController::class, 'show'])->name('legalUsaha.show');
    Route::get('/cek-legal/notifications', [LegalUsahaController::class, 'getNotifications'])->name('legal.notification');

    Route::resource('/user', UserController::class);
    Route::resource('/jenis-umkm', JenisUmkmController::class);
    Route::resource('/kecamatan', KecamatanController::class);
    Route::resource('/desa', DesaController::class);
    Route::resource('/spot', LokasiUmkmController::class);
    Route::resource('/centre-point', CentrePointController::class); 
});
Route::get('/centre-point/data', [DataController::class,'centrepoint'])->name('centre-point.data');

// admin
Route::group(['prefix' => 'dashboard-admin', 'middleware' => ['auth', 'can:view_admin'], 'as' => 'Admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('home'); //admin
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile.index');
    Route::resource('/user', UserAdminController::class);
    Route::resource('/spot', LokasiUmkmController::class);
});

// umkm
Route::group(['prefix' => 'umkm', 'middleware' => ['auth', 'can:view_umkm'], 'as' => 'Umkm'], function () {
    Route::get('/', [FrontController::class, 'index'])->name('home');
    Route::get('/profile', [FrontController::class, 'profile'])->name('profile.index');
    Route::resource('/legalUsaha', LegalUsahaController::class); //apa umkm bisa mendaftarkan dokumen umkm yang berkli kli/cabang? = done
    Route::resource('/keuangan', KeuanganController::class);
    Route::resource('/operasional', OperasionalController::class);
    Route::resource('/marketing', MarketingController::class);
});

// investor
Route::group(['prefix' => 'investor', 'middleware' => ['auth', 'can:view_investor'], 'as' => 'Investor'], function () {
    Route::get('/', [InvestorController::class, 'index'])->name('home');
    Route::get('/maps', [InvestorController::class, 'maps'])->name('maps'); 
    Route::get('/profile', [InvestorController::class, 'profile'])->name('profile.index');
    Route::resource('/meeting', MeetingController::class);
});
