<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\JenisUmkm;
use App\Http\Controllers\Api\KecamatanController;
use App\Http\Controllers\Api\DesaController;
use App\Http\Controllers\Api\OperasionalApiController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\KeuanganApiController;

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

Route::prefix('jenisumkm')->group(function () {
    Route::get('/', [JenisUmkm::class, 'index']);
    Route::post('/', [JenisUmkm::class, 'store']);
    Route::get('/{id}', [JenisUmkm::class, 'show']);
    Route::put('/{id}', [JenisUmkm::class, 'update']);
    Route::delete('/{id}', [JenisUmkm::class, 'destroy']);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/operasional', [OperasionalApiController::class, 'index']);
    Route::post('/operasional', [OperasionalApiController::class, 'store']);
    Route::delete('/operasional/{id}', [OperasionalApiController::class, 'destroy']);
});


Route::middleware('auth:sanctum')->get('/profile', [ProfileController::class, 'show']);

Route::middleware('auth:sanctum')->get('/keuangan', [KeuanganApiController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

});



// Auth route
// Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
