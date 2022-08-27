<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;
use Illuminate\Auth\Access\AuthorizationException;

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
         throw_unless($request->user()->isAdministrator(), AuthorizationException::class, "Vous n'êtes pas autorisé à accéder à cette page");
         
        $foreigners = User::query()
            ->with(['document:id,gender,citizenship,user_id', 'role'])
            ->has('document')->whereRelation('role', 'name', '<>', 'Administrateur')
            ->byRole()->byCitizenship()->search()
            ->paginate(10)
            ->withQueryString();

        return inertia()->render('Foreigners/Index', [
            'foreigners' => $foreigners,
            'filters' => $request->all('role', 'citizenship', 'search'),
        ]);
    }
}
