<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AktaController;
use App\Http\Controllers\ArsipDokumenController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');

    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    
    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    
    Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');

    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

    // Data Akta
    Route::get('/aktas', [AktaController::class, 'index'])->name('aktas.index');

    Route::get('/aktas/create', [AktaController::class, 'create'])->name('aktas.create');

    Route::post('/aktas', [AktaController::class, 'store'])->name('aktas.store');

    Route::get('/aktas/{akta}/edit', [AktaController::class, 'edit'])
    ->name('aktas.edit');

    Route::put('/aktas/{akta}', [AktaController::class, 'update'])
    ->name('aktas.update');

    Route::delete('/aktas/{akta}', [AktaController::class, 'destroy'])
    ->name('aktas.destroy');

    // Arsip Dokumen
    Route::get('/arsip-dokumen', [ArsipDokumenController::class, 'index'])
        ->name('arsip-dokumen.index');

    Route::get('/arsip-dokumen/create', [ArsipDokumenController::class, 'create'])
        ->name('arsip-dokumen.create');

    Route::post('/arsip-dokumen', [ArsipDokumenController::class, 'store'])
        ->name('arsip-dokumen.store');

    Route::get('/arsip-dokumen/{arsipDokumen}/edit', [ArsipDokumenController::class, 'edit'])
        ->name('arsip-dokumen.edit');

    Route::put('/arsip-dokumen/{arsipDokumen}', [ArsipDokumenController::class, 'update'])
        ->name('arsip-dokumen.update');

    Route::delete('/arsip-dokumen/{arsipDokumen}', [ArsipDokumenController::class, 'destroy'])
        ->name('arsip-dokumen.destroy');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
