<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/berita', [HomeController::class, 'berita']);
Route::get('/pengumuman', [HomeController::class, 'pengumuman']);
Route::get('/galeri', [HomeController::class, 'galeri']);
Route::get('/sejarah', [HomeController::class, 'sejarah']);
Route::get('/visimisi', [HomeController::class, 'visimisi']);

// Dashboard
Route::prefix('dashboard')->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::get('/berita', [DashboardController::class, 'berita'])->name('berita');
});


Auth::routes();