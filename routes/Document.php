<?php

use App\Http\Controllers\DocumentController;

Route::get('documents', [DocumentController::class, 'index'])->name('documents.index');
Route::get('documents/create', [DocumentController::class, 'create'])->name('documents.create');
Route::post('documents/store', [DocumentController::class, 'store'])->name('documents.store');