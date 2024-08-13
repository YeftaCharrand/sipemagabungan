<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'dosen'])->group(function () {
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/mahasiswa', [DosenController::class, 'filterByClass'])->name('dosen.filterByClass');
    Route::get('/requestmhs', [DosenController::class, 'Request'])->name('request.index');
    // Route::get('/dosen/filterByClass', [DosenController::class, 'filterByClass'])->name('dosen.filterByClass');
    Route::get('/dosen/search', [DosenController::class, 'search'])->name('dosen.search');
    Route::post('/requestAcc', [DosenController::class, 'UpdateEdit'])->name('update.request');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('/dosen/store', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::post('/dosen/update/{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('/dosen/hapus/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
    // Route::get('/dosen/search', [DosenController::class, 'search'])->name('dosen.search');
    Route::get('/search-mahasiswa', [DosenController::class, 'searchMahasiswa'])->name('search.mahasiswa');
    Route::get('/show-request', [DosenController::class, 'showRequests'])->name('show.request');


});


require __DIR__ . '/auth.php';
