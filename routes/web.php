<?php

use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'index']);

Route::get('/galeri', [GaleriController::class, 'galeri']);

Route::get('/gallery', [PageController::class, 'gallery']);

Route::get('/product', [ModelController::class, 'product']);
