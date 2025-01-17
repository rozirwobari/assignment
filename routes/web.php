<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StrukturController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/berita', [HomeController::class, 'berita']);
Route::get('/pengumuman', [HomeController::class, 'pengumuman']);
Route::get('/galeri', [HomeController::class, 'galeri']);
Route::get('/sejarah', [HomeController::class, 'sejarah']);
Route::get('/visimisi', [HomeController::class, 'visimisi']);
Route::get('/kontak', [HomeController::class, 'kontak']);
Route::post('/kontak', [HomeController::class, 'kirimpesan']);
Route::get('/struktur', [HomeController::class, 'struktur']);
// Dashboard
Route::prefix('dashboard')->group(function () {
    Route::get('/home', [DashboardController::class, 'index']);
    Route::get('/berita', [DashboardController::class, 'berita'])->name('dashboard.berita');
    Route::get('/addberita', [DashboardController::class, 'addberita']);
    Route::post('/addberita', [DashboardController::class, 'addedberita']);
    Route::get('/editberita/{id}', [DashboardController::class, 'editberita']);
    Route::post('/deletegambar', [DashboardController::class, 'deletegambar']);
    Route::post('/updateberita', [DashboardController::class, 'updateberita']);
    Route::post('/deleteberita', [DashboardController::class, 'deleteberita']);
    Route::post('/namedesk', [DashboardController::class, 'namedesk']);
    Route::post('/visimisi', [DashboardController::class, 'visimisi']);
    Route::post('/addbanner', [DashboardController::class, 'addbanner']);
    Route::post('/deletebanner', [DashboardController::class, 'deletebanner']);
    Route::get('/kontak', [DashboardController::class, 'kontak']);
    Route::post('/kontak', [DashboardController::class, 'updatekontak']);
    Route::get('/galeri', [DashboardController::class, 'galeri'])->name('dashboard.galeri');
    Route::get('/addgaleri', [DashboardController::class, 'addgaleri']);
    Route::post('/addgaleri', [DashboardController::class, 'addedgaleri']);
    Route::get('/editgaleri/{id}', [DashboardController::class, 'editgaleri']);
    Route::post('/updategaleri', [DashboardController::class, 'updategaleri']);
    Route::post('/deletegaleri', [DashboardController::class, 'deletegaleri']);
    Route::post('/favicon', [DashboardController::class, 'favicon']);
    Route::post('/logo', [DashboardController::class, 'logo']);
    Route::get('/account', [DashboardController::class, 'account'])->name('dashboard.account');
    Route::get('/editaccount/{id}', [DashboardController::class, 'editaccount']);
    Route::post('/updateaccount', [DashboardController::class, 'updateaccount']);
    Route::post('/deleteaccount', [DashboardController::class, 'deleteaccount']);
    Route::get('/logs', [DashboardController::class, 'logs'])->name('dashboard.logs');
    Route::get('/detaillogs/{id}', [DashboardController::class, 'detaillogs']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/photo_profile', [ProfileController::class, 'photoprofile']);
    Route::post('/editprofile', [ProfileController::class, 'editprofile']);
    Route::get('/struktur', [StrukturController::class, 'index']);
    Route::post('/struktur', [StrukturController::class, 'store']);
    Route::post('/destroystruktur', [StrukturController::class, 'destroy']);
});


Auth::routes();