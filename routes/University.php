<?php

use App\Http\Controllers\UniversityController;
use Illuminate\Support\Facades\Route;

Route::get('universities', [UniversityController::class, 'index']);
