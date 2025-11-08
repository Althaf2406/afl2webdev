<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ModelController;

Route::get('/', [PageController::class, 'index']);

Route::get('/index', [PageController::class, 'index']);

Route::get('/gallery', [PageController::class, 'gallery']);

Route::get('/product', [ModelController::class, 'product']);
