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
        return inertia()->render('Users/Index', [
            'users' => User::with(['role' => fn($q) => $q->where('name', '<>', 'Administrateur')])->get(),
        ]);
    }
}
