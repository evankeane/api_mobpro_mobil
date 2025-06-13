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


Route::get('items/all', [GalleryController::class, 'allItems']);
Route::get('items', [GalleryController::class, 'index']);
Route::post('items', [GalleryController::class, 'store']);
Route::get('items/{item}', [GalleryController::class, 'show']);
Route::post('items/{item}', [GalleryController::class, 'update']);
Route::patch('items/{item}', [GalleryController::class, 'update']);
Route::delete('items/{item}', [GalleryController::class, 'destroy']);
Route::get('images/{id}', function ($id) {
    $ket = Gallery::where('id', $id)->firstOrFail();
    // dd($imageName);
    $path = storage_path('app/public/' . $ket->gambar);
    if (!file_exists($path)) {
        return response()->json(['message' => 'Image not found'], 404);
    }
    return response()->file($path);
});
