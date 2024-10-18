<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home route
Route::get('/home', function () {
    return view('pages.home');
})->name('pages.home');

// Login route
Route::get('/', function () {
    return view('pages.login');
})->name('pages.login');
    


// Booking routes
Route::resource('booking', BookingController::class);

// Manage Account routes
Route::prefix('manage-account')->name('manage-account.')->group(function() {
    Route::get('/add', [UserController::class, 'create'])->name('create');
    Route::post('/add', [UserController::class, 'store'])->name('store');
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/edit/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
});


Route::post('/login', [UserController::class, 'login'])->name('login.auth');