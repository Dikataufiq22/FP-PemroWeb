<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ProductController::class, 'index'], function () {
    return view('index');
});

Route::get('/booking', [BookingController::class, 'index'])->name('booking.index')->middleware(['auth', 'verified'])->name('booking.index');
Route::post('/add-booking', action: [BookingController::class, 'addBooking'])->name('booking.add');

Route::get('/catalog', [CatalogController::class, 'index'])->middleware(['auth', 'verified'])->name('catalog.index');
Route::get('/catalog/{id}', [ProductController::class, 'show'])->name('catalog.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/booking-history', [ProfileController::class, 'bookingHistory'])->name('profile.booking-history');
    Route::get('/profile/booking-history/{id}', [ProfileController::class, 'bookingDetail'])->name('booking.detail');
});

Route::get('/product-detail/{id}', [ProductController::class, 'show'])->name('product.detail');
Route::post('/review', [\App\Http\Controllers\ReviewController::class, 'store'])->name('review.store');

require __DIR__.'/auth.php';
