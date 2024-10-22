<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\KecamatanController;
use App\Http\Controllers\Api\DesaController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/kecamatan', [KecamatanController::class, 'index']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/desa', [DesaController::class, 'index']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
});

// Auth route
// Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
