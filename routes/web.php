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
Route::get('/kontak', [HomeController::class, 'kontak']);
Route::post('/kontak', [HomeController::class, 'kirimpesan']);
// Dashboard
Route::prefix('dashboard')->group(function () {
    Route::get('/home', [DashboardController::class, 'index']);
    Route::get('/berita', [DashboardController::class, 'berita']);
    Route::get('/addberita', [DashboardController::class, 'addberita']);
    Route::post('/namedesk', [DashboardController::class, 'namedesk']);
    Route::post('/visimisi', [DashboardController::class, 'visimisi']);
    Route::post('/addbanner', [DashboardController::class, 'addbanner']);
    Route::post('/deletebanner', [DashboardController::class, 'deletebanner']);
    Route::get('/kontak', [DashboardController::class, 'kontak']);
    Route::post('/kontak', [DashboardController::class, 'updatekontak']);
});


Auth::routes();