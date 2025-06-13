<?php

// use App\Http\Controllers\API\KendaraanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CryptoApi;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TanamanController;
// use App\Http\Controllers\Api\KendaraanController;

// Route::apiResource('kendaraans', KendaraanController::class);
Route::post('/kendaraans/store', [KendaraanController::class, 'store']);
Route::get('/kendaraans', [KendaraanController::class, 'index']);
Route::post('/kendaraans/{id}', [KendaraanController::class, 'update']);
Route::delete('/kendaraans/{id}', [KendaraanController::class, 'destroy']);


Route::get('items/all', [GalleryController::class, 'allItems']);
Route::get('items', [GalleryController::class, 'index']);
Route::post('items', [GalleryController::class, 'store']);
Route::get('items/{item}', [GalleryController::class, 'show']);
Route::post('items/{item}', [GalleryController::class, 'update']);
Route::patch('items/{item}', [GalleryController::class, 'update']);
Route::delete('items/{item}', [GalleryController::class, 'destroy']);
Route::get('images/{id}', function ($id) {
    $ket = Gallery::where('id', $id)->firstOrFail();
    $path = storage_path('app/public/' . $ket->gambar);
    if (!file_exists($path)) {
        return response()->json(['message' => 'Image not found'], 404);
    }
    return response()->file($path);
});

//route for crypto api
Route::get('crypto/all', [CryptoApi::class, 'allItems']);
Route::get('crypto', [CryptoApi::class, 'index']);
Route::post('crypto', [CryptoApi::class, 'store']);
Route::post('crypto/{id}', [CryptoApi::class, 'update']);
Route::delete('crypto/{id}', [CryptoApi::class, 'destroy']);


//route for player api
Route::get('players', [PlayerController::class, 'index']);
Route::post('players', [PlayerController::class, 'store']);
Route::post('players/{id}', [PlayerController::class, 'update']);
Route::delete('players/{id}', [PlayerController::class, 'destroy']);

//route for tanaman api
Route::get('/tanaman', [TanamanController::class, 'index'])->name('tanaman.index');
Route::post('/tanaman', [TanamanController::class, 'store'])->name('tanaman.store');
Route::post('/tanaman/{id}', [TanamanController::class, 'update'])->name('tanaman.update');
Route::delete('/tanaman/{id}', [TanamanController::class, 'destroy'])->name('tanaman.destroy');
