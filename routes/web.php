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
use App\Http\Controllers\PemilikUmkmController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LegalUsahaController;
use App\Http\Controllers\OperasionalController;
use App\Http\Controllers\MarketingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(
    ['register' => false],
);

// Auth::routes();

Route::fallback(function () {
    return view('errors.404'); //costume 404
});

// superadmin
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'can:view_masterAdmin'], 'as' => 'Master Admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('user', UserController::class); //menampilkan data user
    Route::get('profile', [HomeController::class, 'profile'])->name('profile.index'); //test
    Route::resource('jenis-umkm', JenisUmkmController::class); //menampilkan data jenis umkm
    Route::resource('kecamatan', KecamatanController::class); //menampilkan data kecamatan
    Route::resource('desa', DesaController::class); //menampilkan data desa
    Route::resource('spot', LokasiUmkmController::class); //menampilkan data lokasi umkm
    Route::resource('centre-point', CentrePointController::class); //latihan
    Route::resource('kepemilikan-umkm', PemilikUmkmController::class); //menampilkan data profil pemilik
});
Route::get('/centre-point/data', [DataController::class,'centrepoint'])->name('centre-point.data');

// admin
Route::group(['prefix' => 'dashboard-admin', 'middleware' => ['auth', 'can:view_admin'], 'as' => 'Admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('home'); //admin
    Route::resource('user', UserAdminController::class);
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile.index');
    Route::resource('spot', LokasiUmkmController::class);
    Route::resource('kepemilikan-umkm', PemilikUmkmController::class);
});

// umkm
Route::group(['prefix' => 'umkm', 'middleware' => ['auth', 'can:view_umkm'], 'as' => 'Umkm'], function () {
    Route::get('/', [FrontController::class, 'index'])->name('home'); //admin
    Route::get('/profile', [FrontController::class, 'profile'])->name('profile.index');
    Route::resource('/legalUsaha', LegalUsahaController::class); //apa umkm bisa mendaftarkan dokumen umkm yang berkli kli/cabang?
    Route::resource('/keuangan', KeuanganController::class);
    Route::resource('/operasional', OperasionalController::class); //masih keuangan kontrollernya
    Route::resource('/marketing', MarketingController::class); //blum ada controll
});

Route::group(['prefix' => 'investor', 'middleware' => ['auth', 'can:view_investor'], 'as' => 'Investor'], function () {
    Route::get('/', [InvestorController::class, 'index'])->name('home');
    Route::get('maps', [InvestorController::class, 'maps'])->name('maps'); 
    Route::get('/profile', [InvestorController::class, 'profile'])->name('profile.index');
});
