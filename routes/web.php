<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PublicBeritaController;
use App\Models\Berita;

Route::get('/', function () {
    $beritaTerbaru = Berita::where('status', 'published')
        ->orderBy('tanggal_terbit', 'desc')
        ->take(1)
        ->get();

    return view('welcome', compact('beritaTerbaru'));
});

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog');

Route::get('/berita', [PublicBeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [PublicBeritaController::class, 'show'])->name('berita.show');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['owner'])->prefix('owner')->group(function () {
    Route::get('/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');

    Route::get('/berita', [BeritaController::class, 'index'])->name('owner.berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('owner.berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('owner.berita.store');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('owner.berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('owner.berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('owner.berita.destroy');

    Route::get('/produk', [OwnerController::class, 'produk'])->name('owner.produk');
    Route::post('/produk', [OwnerController::class, 'storeProduk'])->name('owner.produk.store');
    Route::post('/produk/update/{id}', [OwnerController::class, 'updateProduk'])->name('owner.produk.update');
    Route::post('/produk/delete/{id}', [OwnerController::class, 'deleteProduk'])->name('owner.produk.delete');
});