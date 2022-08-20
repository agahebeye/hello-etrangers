<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware(['web'])]
class ForeignerController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    #[Get('/foreigners', name: 'foreigners.index', middleware:'auth')]
    public function __invoke(Request $request)
    {

        $foreigners = User::get();

        return inertia()->render('Foreigners/Index', [
            'foreigners' => $foreigners,
            'role' => $request->get('role'),
        ]);
    }
}
