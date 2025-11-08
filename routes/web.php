<?php

use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'index']);

Route::get('/galeri', [GaleriController::class, 'galeri']);

Route::post('add.gallery', [GaleriController::class, 'store'])->name('add.gallery');

Route::put('/galeri/update/{id}', [GaleriController::class, 'update']);

Route::delete('/galeri/delete/{id}', [GaleriController::class, 'destroy']);

Route::get('/mining-assets', [PageController::class, 'mining_assets']);

Route::get('/project-data', [PageController::class, 'project_data']);

Route::get('/investor-relation', [PageController::class, 'investor_relation']);

