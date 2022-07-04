<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserPhotoController extends Controller
{
    public function create(User $user): \Inertia\Response
    {
        return Inertia::render('User/Photo/Create.vue')->with(['user', $user]);
    }

    public function store(User $user)
    {
        request()->validate(['photo' => ['image', 'dimensions:min_with=200,min_height=200', 'max:2000']]);
        $photo = request()->file('photo')->storePublicly('/avatars', 'public');
        $user->photo()->create(['src' => $photo]);

        Auth::login($user);
        
        return redirect(RouteServiceProvider::HOME);
    }
}
