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
        $universities = University::select(['id', 'name', 'photo_url'])->get();
        $hotels = Hotel::select(['id', 'name'])->with(['featuredPhoto'])->get();
        $markets = Market::select(['id', 'name'])->get();
        $cities = City::select(['id', 'name'])->with(['featuredPhoto'])->get();

        $data = [
            'universities' => $universities,
            'hotels' =>  $hotels,
            'markets' => $markets,
            'cities' => $cities,
        ];

        return inertia()->render('Home', $data);
    }
}
