<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserPhotoController extends Controller
{
    public function create(User $user): \Inertia\Response
    {
        return Inertia::render('User/Photo/Create.vue')->with(['user', $user]);
    }
}
