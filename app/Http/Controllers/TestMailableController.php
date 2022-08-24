<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;

#[Middleware('web')]
class TestMailableController
{
    #[Get('/validated-mailable', name: 'validated-mailable')]
    public function validated()
    {
        return new \App\Mail\DocumentValidated();
    }
}
