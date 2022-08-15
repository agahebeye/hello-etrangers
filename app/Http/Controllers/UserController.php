<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware('web')]
class UserController extends Controller
{
    #[Get('/users', name: 'users.index', middleware: ['auth'])]
    public function index()
    {
        $users = User::query()
            ->with('role')
            ->get()
            ->filter(fn (User $user) => $user->role?->name != 'Administrateur');

        return inertia()->render('Users/Index', [
            'users' => $users
        ]);
    }
}
