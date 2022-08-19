<?php

namespace App\Http\Controllers;

use App\Models\University;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware('web')]
class UniversityController
{
    #[Get('universities/{university}')]
    public function show(University $university): \Inertia\Response
    {
        return inertia()->render(
            'Universities/Show', 
            ['university' => fn() => $university->load('adress')]
        );
    }
}
