<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [HomeController::class, 'index']);
Route::get('/index', [HomeController::class, 'index']);

Route::get('/product', [ProductController::class, 'product']);

Route::get('/galeri', [GaleriController::class, 'galeri']);

Route::post('add.gallery', [GaleriController::class, 'store'])->name('add.gallery');

Route::put('/galeri/update/{id}', [GaleriController::class, 'update']);

Route::delete('/galeri/delete/{id}', [GaleriController::class, 'destroy']);

Route::get('/profile', [ProfileController::class, 'profile']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Menampilkan halaman daftar produk (dengan pencarian optional)
Route::get('/product', [ProductController::class, 'product'])->name('product.list');

// Menambahkan produk baru
Route::post('/add.product', [ProductController::class, 'store'])->name('add.product');

// Memperbarui produk berdasarkan ID
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

// Menghapus produk berdasarkan ID
Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');


require __DIR__.'/auth.php';
