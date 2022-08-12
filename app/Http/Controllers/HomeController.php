<?php

namespace App\Http\Controllers;

use App\Models\City;
use Inertia\Inertia;
use App\Models\Hotel;
use App\Models\Market;
use App\Models\University;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware('web')]
class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    #[Get(uri: '/', name: 'home')]
    public function __invoke(Request $request): \Inertia\Response
    {
        $universities = University::query()->get(['id', 'name']);
        $hotels = Hotel::query()->get(['id', 'name']);
        $markets = Market::query()->get(['id', 'name']);
        $cities = City::query()->get(['id', 'name']);

        return Inertia::render('Home', [
            'universities' => $universities,
            'hotels' =>  $hotels,
            'markets' => $markets,
            'cities' => $cities,
        ]);
    }
}
