<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
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
    #[Get('/foreigners', name: 'foreigners.index', middleware: 'auth')]
    public function __invoke(Request $request)
    {

        $foreigners = User::query()
            ->when($request->get('role'), fn (Builder $query, $role) => $query->ofRole($role))
            ->whereRelation('role', 'name', '<>', 'Administrateur')
            ->get();

        return inertia()->render('Foreigners/Index', [
            'foreigners' => $foreigners,
            'role' => $request->get('role'),
        ]);
    }
}
