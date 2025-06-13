<?php

// use App\Http\Controllers\API\KendaraanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;
// use App\Http\Controllers\Api\KendaraanController;

// Route::apiResource('kendaraans', KendaraanController::class);
Route::post('/kendaraans/store', [KendaraanController::class, 'store']);
Route::get('/kendaraans', [KendaraanController::class, 'index']);
Route::post('/kendaraans/{id}', [KendaraanController::class, 'update']);
Route::delete('/kendaraans/{id}', [KendaraanController::class, 'destroy']);
