<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class UserPhotoController extends Controller
{
    public function create(User $user): \Inertia\Response
    {
        return Inertia::render('User/Photo/Create', [
            'user' => $user
        ]);
    }

    public function store(User $user)
    {
        request()->validate(['photo' => ['image', 'dimensions:min_with=200,min_height=200', 'max:2000']]);
        $photo = request()->file('photo')->storePublicly('/avatars', 'public');
        $user->photo()->create(['src' => $photo]);

        return redirect(RouteServiceProvider::HOME);
    }
}
