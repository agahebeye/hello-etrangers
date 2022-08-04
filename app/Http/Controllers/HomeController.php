<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\University;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    #[Get(uri: '/', name: 'home', middleware: ['guest'])]
    public function __invoke(Request $request): \Inertia\Response
    {
        $universities = University::query()->get();
        $hotels = Hotel::query()->get();

        return Inertia::render('Home', [
            'universities' => $universities,
            'hotels' =>  $hotels,
        ]);
    }
}
