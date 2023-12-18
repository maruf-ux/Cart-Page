<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('website.index');
});


Route::get('/cart', function () {
    return view('website.cart');
});


Route::get('/checkout', function () {
    return view('website.checkout');
});


Route::get('/shop', function () {
    return view('website.shop');
});


Route::get('/shop/view', function () {
    return view('website.single-product');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
