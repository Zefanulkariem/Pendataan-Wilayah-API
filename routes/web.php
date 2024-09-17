<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// superadmin
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth'], 'as' => 'superAdmin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(['can:view_masterAdmin', 'can:view_admin', 'can:view_umkm', 'can:view_investor']);
});

// admin
Route::group(['prefix' => 'dashboard-admin', 'middleware' => ['auth'], 'as' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->middleware(['can:view_admin']);//admin
});

// user investor & umkm
Route::get('/umkm', [FrontController::class, 'index'])->middleware(['can:view_umkm']);//umkm
Route::get('/investor', [InvestorController::class, 'index'])->middleware(['can:view_investor']);//investor
