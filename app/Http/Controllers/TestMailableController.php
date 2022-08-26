<?php

namespace App\Http\Controllers;

use Spatie\RouteAttributes\Attributes\Get;

#[Middleware('web')]
class TestMailableController
{
    #[Get('/test-integration', name: 'integration')]
    public function validated()
    {
        return inertia()->render('test-integration');
    }
}
