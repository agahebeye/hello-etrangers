<?php

use Illuminate\Support\Facades\Route;

Route::get('/validated-mailable', function() {
    return new \App\Mail\DocumentValidated();
});
