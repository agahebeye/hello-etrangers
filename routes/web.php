<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserPhotoController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->middleware(['verified'])->name('dashboard');

    Route::get('{user}/photos/create', [UserPhotoController::class, 'create'])->name('users.photos.create');
    Route::post('{user}/photos/store', [UserPhotoController::class, 'store'])->name('users.photos.store');

    Route::get('documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::post('documents/store', [DocumentController::class, 'store'])->name('documents.store');
});

require __DIR__ . '/auth.php';
