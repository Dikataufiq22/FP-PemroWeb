<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ProductController::class, 'index'], function () {
    return view('index');
});

Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');

Route::get('/catalog', [ProductController::class, 'catalog'], function () {
    return view('catalog.index');
})->middleware(['auth', 'verified'])->name('catalog');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');



require __DIR__.'/auth.php';
