
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;

// Halaman pengunjung
Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/produk/{product}', [PublicController::class, 'show'])
    ->name('public.products.show');

// Halaman admin CRUD
Route::resource('products', ProductController::class);
