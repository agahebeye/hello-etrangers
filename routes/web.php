<?php

use App\Http\Controllers\UserPhotoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('{user}/photos/create', [UserPhotoController::class, 'create'])->name('users.photos.create');
Route::post('{user}/photos/store', [UserPhotoController::class, 'store'])->name('users.photos.store');

require __DIR__ . '/auth.php';
