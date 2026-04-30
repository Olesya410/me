<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::resource('users', UserController::class);

// Публичные маршруты
Route::group([], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/booking', [BookingController::class, 'booking'])->name('booking');
    Route::get('/login', [LoginController::class, 'showForm'])->name('login');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
    Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    // Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');
    // Route::get('/listing/{id}', [ListingController::class, 'show'])
    //     ->name('listing.show')
    //     ->where('id', '[0-9]+'); // Ограничение: только цифры
    Route::view('/where-to-go', 'where-to-go');
    Route::view('/popular-places', 'popular-places');
});

// Защищённые маршруты (требуют авторизации)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/listings/create', [ListingController::class, 'create'])->name('create');
    Route::get('/listings/photocreate', [ListingController::class, 'createphoto'])->name('listings.photocreate');
    Route::post('/photos/upload', [PhotoController::class, 'upload'])->name('photos.upload');
    Route::post('/listings', [ListingController::class, 'store'])->name('listings.store');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');
Route::get('/listing/{id}', [ListingController::class, 'show'])->name('listing.show');
Route::get('/my-bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::post('/listing/{listing}/book', [BookingController::class, 'store'])->name('listing.book');
Route::delete('/booking/{booking}', [BookingController::class, 'destroy'])->name('booking.cancel');
Route::post('/listings/{listing}/hostreview', [ListingController::class, 'storeHost'])->name('listings.hostreview');
Route::post('/listings/{listing}/review', [ListingController::class, 'storeReview'])->name('listings.review');
Route::post('/listings/review', [ListingController::class, 'store'])->name('listings.review');
Route::post('/bookings/{listing}', [BookingController::class, 'store'])->name('bookings.store');
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->name('listings.destroy');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
// Route::get('/profile/showroom', [ListingController::class, 'showroom'])->name('profile.showroom');
// Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->name('listings.edit');
// Route::put('/listings/{listing}', [ListingController::class, 'update'])->name('listings.update');