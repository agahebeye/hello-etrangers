<?php

namespace App\Http\Controllers;

use App\Models\City;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware('web')]
class CityController
{
    #[Get(uri: '/cities/{city}', name: 'cities.show')]
    public function __invoke(City $city)
    {
        return inertia()->render('Cities/Show', [
            'city' => fn () => $city->load(['photos', 'location',])
        ]);
    }
}
