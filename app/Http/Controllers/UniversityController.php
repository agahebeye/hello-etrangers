<?php

namespace App\Http\Controllers;

use App\Models\University;
use Spatie\RouteAttributes\Attributes\Get;

class UniversityController
{
    #[Get('universities/{university}')]
    public function show(University $university): \Inertia\Response
    {
        return inertia()->render('Universities/Show', ['university' => $university]);
    }
}
