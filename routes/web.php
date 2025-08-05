<?php

use App\Http\Controllers\artikelController;
use App\Http\Controllers\portofolioController;
use App\Http\Controllers\tipsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\berandaController;

// Route::get('/', function () {
//     return view('beranda');
// });

// routes/web.php
// Route::get('/beranda', function () {
//     return view('beranda');
// })->name('beranda');
Route::get('/', [berandaController::class,'index'])->name('beranda');
Route::get('/beranda', [berandaController::class,'index',] , )->name('beranda');

// Route::get('/artikel', function () {
//     return view('artikel');
// })->name('artikel');



// Route Artikel
Route::get('/artikel', [artikelController::class,'index',] , )->name('artikel');
Route::get('/artikel/{id}', [artikelController::class, 'detail'])->name('artikel.detail');
Route::get('/artikel/{id}/bab/{bab_id}', [artikelController::class, 'bab'])->name('artikel.bab');
Route::get('/artikel/kategori', [artikelController::class, 'kategori'])->name('artikel.kategori');
Route::get('/artikel/kategori/{kategori}', [artikelController::class, 'kontenKategori'])->name('konten_kategori');
Route::get('/artikel/kategori/{kategori}', [artikelController::class, 'kontenKategori'])->name('artikel.kategori.konten');


// Route Tips
Route::get('/tips', [tipsController::class,'index',] , )->name('tips');
Route::get('/tips/{id}', [tipsController::class, 'detail'])->name('tips.detail');
Route::get('/tips/{id}/bab/{bab_id}', [tipsController::class, 'bab'])->name('tips.bab');
Route::get('/tips/kategori', [tipsController::class, 'kategori'])->name('tips.kategori');
Route::get('/tips/kategori/{kategori}', [tipsController::class, 'kontenKategori'])->name('konten_kategori');
Route::get('/tips/kategori/{kategori}', [tipsController::class, 'kontenKategori'])->name('tips.kategori.konten');




Route::get('/video', function () {
    return view('video');
})->name('video');

// Route::get('/tips', function () {
//     return view('tips');
// })->name('tips');

Route::get('/ttg_kami', function () {
    return view('ttg_kami');
})->name('ttg_kami');

// routes artikel
// Route::get('/artikel/1', function () {
//     return view('artikel/1');
// })->name('artikel/1');

// Route::get('/artikel/2', function () {
//     return view('artikel/2');
// })->name('artikel/2');

// Route::get('/artikel/kategori', function () {
//     return view('artikel/kategori');
// })->name('artikel/kategori');

// routes video
Route::get('/video/1', function () {
    return view('video/1');
})->name('video/1');

Route::get('/video/2', function () {
    return view('video/2');
})->name('video/2');

// routes portofolio
// Route::get('/portofolio/1', function () {
//     return view('portofolio/1');
// })->name('portofolio/1');

Route::get('/portofolio', [portofolioController::class,'index'])->name('portofolio.index');

Route::get('/portofolio/{id}', [PortofolioController::class, 'show'])->name('portofolio.show');

// Route::get('/portofolio/1', [portofolioController::class,'index',] , )->name('/portofolio/1');

// Route::get('/portofolio/2', function () {
//     return view('portofolio/2');
// })->name('portofolio/2');