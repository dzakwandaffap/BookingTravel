<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;

// ==========================
// Auth Pages
// ==========================

// Tampilkan form login
Route::get('/', [UserController::class, 'showLoginForm'])->name('login');

// Proses login
Route::post('/login', [UserController::class, 'login'])->name('login.auth');

// Proses logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// ==========================
// Register Pages
// ==========================

// Tampilkan form register
Route::get('/register', [UserController::class, 'create'])->name('account.create');

// Proses simpan user baru
Route::post('/register', [UserController::class, 'store'])->name('account.store');

// ==========================
// Protected Routes (harus login)
// ==========================
Route::middleware('auth')->group(function () {
    // Dashboard/Home page
    Route::get('/home', [UserController::class, 'home'])->name('pages.home');

    // Profile Routes - PINDAHKAN KELUAR DARI account GROUP
    Route::get('/profile', [UserController::class, 'profile'])->name('account.profile');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');

    // Account Management Routes
    Route::prefix('account')->name('account.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    // Booking Routes
    Route::prefix('booking')->name('booking.')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
        Route::get('/create', [BookingController::class, 'create'])->name('create');
        Route::post('/store', [BookingController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BookingController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [BookingController::class, 'update'])->name('update');
        Route::delete('/{id}', [BookingController::class, 'destroy'])->name('destroy');
    });
});
