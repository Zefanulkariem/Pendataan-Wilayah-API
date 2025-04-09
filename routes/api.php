<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\OperasionalController;
use App\Http\Controllers\Api\MapsController;
use App\Http\Controllers\Api\MeetingController;

// Route::prefix('operasionals')->group(function () {
    //     Route::get('/', [OperasionalController::class, 'index']);
    //     Route::post('/', [OperasionalController::class, 'store']);
    //     Route::get('/{id}', [OperasionalController::class, 'show']);
    //     Route::put('/{id}', [OperasionalController::class, 'update']);
    //     Route::delete('/{id}', [OperasionalController::class, 'destroy']);
    // });

    
// Auth route
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/profile', [ProfileController::class, 'profile']);

Route::group(['prefix' => 'maps'], function () {
    Route::get('/', [MapsController::class, 'index']);
    Route::get('/{id}', [MapsController::class, 'show']);
});

Route::middleware(['auth:sanctum', 'can:view_investor'])->prefix('meeting')->group(function () {
    Route::get('/', [MeetingController::class, 'index']);
    Route::post('/', [MeetingController::class, 'store']);
    Route::delete('/{id}', [MeetingController::class, 'destroy']);
});