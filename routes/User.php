<?php

Route::get('{user}/photos/create', [UserPhotoController::class, 'create'])->name('users.photos.create');
Route::post('{user}/photos/store', [UserPhotoController::class, 'store'])->name('users.photos.store');
