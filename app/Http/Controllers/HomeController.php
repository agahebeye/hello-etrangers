<?php

namespace App\Http\Controllers;

use App\Models\City;
use Inertia\Inertia;
use App\Models\Hotel;
use App\Models\Market;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware('web')]
class HomeController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    #[Get(uri: '/', name: 'home')]
    public function __invoke(Request $request): \Inertia\Response|RedirectResponse
    {
        if ($request->user()->role->name === 'Administrateur') {
            return redirect('/dashboard');
        }
        
        return inertia()->render('Home', [
            'universities' => fn () => University::select(['id', 'name'])->with('photo')->get(),
            'hotels' => fn () => Hotel::select(['id', 'name'])->with(['photo'])->get(),
            'markets' => fn () =>  Market::select(['id', 'name'])->with(['photo'])->get(),
            'cities' => fn () => City::select(['id', 'name'])->with(['photo'])->get(),
        ]);
    }
}
