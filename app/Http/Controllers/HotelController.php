<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware('web')]
class HotelController
{
    #[Get('/hotels/{hotel}')]
    public function show(Hotel $hotel) {
        return inertia()->render('Hotels/Show', ['hotel' => $hotel]);
    }
}
