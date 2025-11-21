<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman Welcome
Route::get('/', function () {
    return view('welcome');
});

// Halaman Concerts
use App\Http\Controllers\ConcertController;
Route::get('/concerts', [ConcertController::class, 'index'])->name('concerts.index');
Route::get('/concerts/search', [ConcertController::class, 'search'])->name('concerts.search');

// ============================
// DASHBOARD MULTI-ROLE
// ============================
Route::middleware(['auth'])->group(function () {

    // Route dashboard untuk Admin
    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin');
    })->name('admin.dashboard');

    // Route dashboard untuk EO
    Route::get('/eo/dashboard', function () {
        return view('dashboard.eo');
    })->name('eo.dashboard');

    // Route dashboard untuk User biasa
    Route::get('/user/dashboard', function () {
        return view('dashboard.user');
    })->name('user.dashboard');
});

// ============================
// PROFILE
// ============================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
