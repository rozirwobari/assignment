<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/berita', [HomeController::class, 'berita']);
Route::get('/pengumuman', [HomeController::class, 'pengumuman']);
Route::get('/galeri', [HomeController::class, 'galeri']);
Route::get('/sejarah', [HomeController::class, 'sejarah']);
Route::get('/visimisi', [HomeController::class, 'visimisi']);
