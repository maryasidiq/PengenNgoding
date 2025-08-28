<?php

use App\Http\Controllers\artikelController;
use App\Http\Controllers\portofolioController;
use App\Http\Controllers\tipsController;
use App\Http\Controllers\videoController;
use App\Http\Controllers\Admin\AdminPortofolioController;
use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Admin\AdminArtikelController;
use App\Http\Controllers\Admin\AdminTipsController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminTestimoniController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\TrixUploadController;

//Route Beranda
Route::get('/', [berandaController::class, 'index'])->name('beranda');
// Route::get('/beranda', [berandaController::class, 'index',], )->name('beranda');

//Route Portofolio
Route::get('/portofolio', [portofolioController::class, 'index'])->name('portofolio.index');
Route::get('/portofolio/{id}', [PortofolioController::class, 'show'])->name('portofolio.show');

// Route Artikel
Route::get('/artikel/kategori', [artikelController::class, 'kategori'])->name('artikel.kategori');
Route::get('/artikel/kategori/{kategori}', [artikelController::class, 'kontenKategori'])->name('artikel.kategori.konten');
Route::get('/artikel', [artikelController::class, 'index',], )->name('artikel');
Route::get('/artikel/{id}', [artikelController::class, 'detail'])->name('artikel.detail');
Route::get('/artikel/{id}/bab/{bab_id}', [artikelController::class, 'bab'])->name('artikel.bab');

// Route Tips
Route::get('/tips/kategori', [tipsController::class, 'kategori'])->name('tips.kategori');
Route::get('/tips/kategori/{kategori}', [tipsController::class, 'kontenKategori'])->name('tips.kategori.konten');
Route::get('/tips', [tipsController::class, 'index',], )->name('tips');
Route::get('/tips/{id}', [tipsController::class, 'detail'])->name('tips.detail');
Route::get('/tips/{id}/bab/{bab_id}', [tipsController::class, 'bab'])->name('tips.bab');

//Route Video
Route::get('/video/kategori', [videoController::class, 'kategori'])->name('video.kategori');
Route::get('/video/kategori/{kategori}', [videoController::class, 'kontenKategori'])->name('video.kategori.konten');
Route::get('/video', [videoController::class, 'index',], )->name('video');
Route::get('/video/{id}', [videoController::class, 'detail'])->name('video.detail');
Route::get('/video/{id}/bab/{bab_id}', [videoController::class, 'bab'])->name('video.bab');

//Route Tentang Kami
Route::get('/ttg_kami', [TentangKamiController::class, 'index'])->name('ttg_kami');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('jpr')->name('admin.')->middleware('auth')->group(function () {
    // User Management
    Route::get('users', [AdminUserController::class, 'index'])->name('user_management');
    Route::put('users', [AdminUserController::class, 'update'])->name('user_management.update');
    // Dashboard
    Route::get('', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Portofolio Management
    Route::resource('portofolio', AdminPortofolioController::class)->except(['show']);

    // Client Management
    Route::resource('client', AdminClientController::class)->except(['show']);

    // Tips Management
    Route::resource('tips', AdminTipsController::class)->except(['show']);
    Route::get('tips/{tip}/konten', [AdminTipsController::class, 'showKonten'])->name('tips.konten');
    Route::get('tips/{tip}/konten/{konten}/edit', [AdminTipsController::class, 'editKonten'])->name('tips.konten.edit');
    Route::put('tips/{tip}/konten/{konten}', [AdminTipsController::class, 'updateKonten'])->name('tips.konten.update');
    Route::delete('tips/{tip}/konten/{konten}', [AdminTipsController::class, 'destroyKonten'])->name('tips.konten.destroy');
    Route::get('tips/{tip}/konten/create', [AdminTipsController::class, 'createKonten'])->name('tips.konten.create');
    Route::post('tips/{tip}/konten', [AdminTipsController::class, 'storeKonten'])->name('tips.konten.store');

    // Video Management
    Route::resource('video', AdminVideoController::class)->except(['show']);
    Route::get('video/{video}/konten', [AdminVideoController::class, 'showKonten'])->name('video.konten');
    Route::get('video/{video}/konten/{konten}/edit', [AdminVideoController::class, 'editKonten'])->name('video.konten.edit');
    Route::put('video/{video}/konten/{konten}', [AdminVideoController::class, 'updateKonten'])->name('video.konten.update');
    Route::delete('video/{video}/konten/{konten}', [AdminVideoController::class, 'destroyKonten'])->name('video.konten.destroy');
    Route::get('video/{video}/konten/create', [AdminVideoController::class, 'createKonten'])->name('video.konten.create');
    Route::post('video/{video}/konten', [AdminVideoController::class, 'storeKonten'])->name('video.konten.store');

    // Artikel Konten Management
    Route::resource('artikel', AdminArtikelController::class)->except(['show']);
    Route::get('artikel/{artikel}/konten', [AdminArtikelController::class, 'showKonten'])->name('artikel.konten');
    Route::get('artikel/{artikel}/konten/{konten}/edit', [AdminArtikelController::class, 'editKonten'])->name('artikel.konten.edit');
    Route::put('artikel/{artikel}/konten/{konten}', [AdminArtikelController::class, 'updateKonten'])->name('artikel.konten.update');
    Route::delete('artikel/{artikel}/konten/{konten}', [AdminArtikelController::class, 'destroyKonten'])->name('artikel.konten.destroy');
    Route::get('artikel/{artikel}/konten/create', [AdminArtikelController::class, 'createKonten'])->name('artikel.konten.create');
    Route::post('artikel/{artikel}/konten', [AdminArtikelController::class, 'storeKonten'])->name('artikel.konten.store');

    // Testimoni Management
    Route::resource('testimoni', AdminTestimoniController::class)->except(['show']);

    // Category Management
    Route::get('kategori', [AdminCategoryController::class, 'index'])->name('kategori.index');
    Route::get('kategori/create', [AdminCategoryController::class, 'create'])->name('kategori.create');
    Route::post('kategori', [AdminCategoryController::class, 'store'])->name('kategori.store');
    Route::get('kategori/{category}', [AdminCategoryController::class, 'show'])->name('kategori.show');
    Route::get('kategori/{category}/edit', [AdminCategoryController::class, 'edit'])->name('kategori.edit');
    Route::put('kategori/{category}', [AdminCategoryController::class, 'update'])->name('kategori.update');
    Route::delete('kategori/{category}', [AdminCategoryController::class, 'destroy'])->name('kategori.destroy');

});

Route::post('/trix-upload', [TrixUploadController::class, 'store'])->name('trix.upload');