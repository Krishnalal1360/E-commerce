<?php

use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PageController;

Route::get('/login', function () {
    //return view('welcome');
    //return view('pages.home');
    return view('auth.login');
});

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/product-details/{id}', [PageController::class, 'show'])->name('product-details');

Route::post('/add-to-cart/{id}', [AddToCartController::class, 'store'])->name('add-to-cart');

Route::get('/dashboard', [ProductController::class, 'index'])->middleware(['auth', 'verified', 'PreventBack'])->name('dashboard');

Route::middleware('auth', 'PreventBack')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Logout
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    // Product Routes
    Route::resource('products', ProductController::class);
});

require __DIR__.'/auth.php';
