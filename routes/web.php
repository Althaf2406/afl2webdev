<?php

use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [PageController::class, 'index']);

Route::get('/product', [ProductController::class, 'product']);

Route::get('/galeri', [GaleriController::class, 'galeri']);

Route::post('add.gallery', [GaleriController::class, 'store'])->name('add.gallery');

Route::put('/galeri/update/{id}', [GaleriController::class, 'update']);

Route::delete('/galeri/delete/{id}', [GaleriController::class, 'destroy']);

?>