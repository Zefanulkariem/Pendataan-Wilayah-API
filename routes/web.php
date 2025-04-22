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
use App\Http\Controllers\LogaktivitasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('tentang');
});

Route::get('/contact', function () {
    return view('contact');
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
    Route::resource('user', UserController::class);
    Route::get('profile', [HomeController::class, 'profile'])->name('profile.index'); //test
    Route::get('/profile/edit', [HomeController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update/{id}', [HomeController::class, 'updateProfile'])->name('profile.update');
    
    Route::get('/keuangan/menu', [KeuanganController::class, 'menu'])->name('keuangan.menu');
    Route::get('/keuangan/menu/show/{id}', [KeuanganController::class, 'show'])->name('keuangan.show');
    Route::get('/keuangan/notifications', [KeuanganController::class, 'getNotifications'])->name('uang.notification');
    Route::put('/keuangan/approve/{id}', [KeuanganController::class, 'approve'])->name('keuangan.approve');
    Route::put('/keuangan/reject/{id}', [KeuanganController::class, 'reject'])->name('keuangan.reject');
    
    Route::get('/meeting', [MeetingController::class, 'menu'])->name('meeting.menu');
    Route::get('/meeting/show/{id}', [MeetingController::class, 'show'])->name('meeting.show');
    Route::get('/meeting/notifications', [MeetingController::class, 'getNotifications'])->name('meeting.notification');
    Route::put('/meeting/apporve/{id}', [MeetingController::class, 'approve'])->name('meeting.approve');
    Route::put('/meeting/reject/{id}', [MeetingController::class, 'reject'])->name('meeting.reject');

    Route::resource('jenis-umkm', JenisUmkmController::class); //menampilkan data jenis umkm
    Route::resource('kecamatan', KecamatanController::class); //menampilkan data kecamatan
    Route::resource('desa', DesaController::class); //menampilkan data desa
    Route::resource('spot', LokasiUmkmController::class); //menampilkan data lokasi umkm
    Route::get('/logaktivitas', [LogaktivitasController::class, 'index'])->name('logaktivitas.index');
    Route::resource('centre-point', CentrePointController::class); //latihan
});
Route::get('/centre-point/data', [DataController::class,'centrepoint'])->name('centre-point.data');

// admin
Route::group(['prefix' => 'dashboard-admin', 'middleware' => ['auth', 'can:view_admin'], 'as' => 'Admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('home'); //admin
    Route::resource('user', UserAdminController::class);
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile.index');
    Route::get('/profile/edit', [AdminController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update/{id}', [AdminController::class, 'updateProfile'])->name('profile.update');
    Route::resource('spot', LokasiUmkmController::class);

    Route::get('/meeting', [MeetingController::class, 'menuadmin'])->name('meeting.menuadmin');
    Route::get('/meeting/show/{id}', [MeetingController::class, 'showadmin'])->name('meeting.showadmin');
    Route::get('/meeting/notifications', [MeetingController::class, 'getNotifications'])->name('meeting.notification');
    Route::put('/meeting/apporve/{id}', [MeetingController::class, 'approve'])->name('meeting.approve');
    Route::put('/meeting/reject/{id}', [MeetingController::class, 'reject'])->name('meeting.reject');

    Route::get('/keuangan/menu', [KeuanganController::class, 'menuadmin'])->name('keuangan.menuadmin');
    Route::get('/keuangan/menu/show/{id}', [KeuanganController::class, 'showadmin'])->name('keuangan.showadmin');
    Route::get('/keuangan/notifications', [KeuanganController::class, 'getNotifications'])->name('uang.notification');
    Route::put('/keuangan/approve/{id}', [KeuanganController::class, 'approve'])->name('keuangan.approve');
    Route::put('/keuangan/reject/{id}', [KeuanganController::class, 'reject'])->name('keuangan.reject');
});

// umkm
Route::group(['prefix' => 'umkm', 'middleware' => ['auth', 'can:view_umkm'], 'as' => 'Umkm'], function () {
    Route::get('/', [FrontController::class, 'index'])->name('home'); //admin
    Route::get('/profile', [FrontController::class, 'profile'])->name('profile.index');
    Route::get('/profile/edit', [FrontController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update/{id}', [FrontController::class, 'updateProfile'])->name('profile.update');
    Route::resource('/legalUsaha', LegalUsahaController::class); //apa umkm bisa mendaftarkan dokumen umkm yang berkli kli/cabang?
    Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan.index'); // Menampilkan halaman keuangan + notifikasi
    Route::get('/keuangan/create', [KeuanganController::class, 'create'])->name('keuangan.create'); // Form input keuangan
    Route::post('/keuangan/store', [KeuanganController::class, 'store'])->name('keuangan.store'); // Simpan data keuangan
    Route::delete('/keuangan/{id}', [KeuanganController::class, 'destroy'])->name('keuangan.destroy');
    Route::resource('/operasional', OperasionalController::class);
    Route::resource('/marketing', MarketingController::class);
});

// investor
Route::group(['prefix' => 'investor', 'middleware' => ['auth', 'can:view_investor'], 'as' => 'Investor'], function () {
    Route::get('/', [InvestorController::class, 'index'])->name('home');
    Route::get('maps', [InvestorController::class, 'maps'])->name('maps'); 
    Route::get('/profile', [InvestorController::class, 'profile'])->name('profile.index');
    Route::get('/profile/edit', [InvestorController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update/{id}', [InvestorController::class, 'updateProfile'])->name('profile.update');
    Route::get('/meeting/index', [MeetingController::class, 'index'])->name('meeting.index');
    Route::delete('/meeting/{id}', [MeetingController::class, 'destroy'])->name('meeting.destroy');
    Route::get('/meeting/create', [MeetingController::class, 'create'])->name('meeting.create');
    Route::post('/meeting/store', [MeetingController::class, 'store'])->name('meeting.store');
    

});
