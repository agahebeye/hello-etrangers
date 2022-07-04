<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserPhotoController extends Controller
{
    public function create(): \Inertia\Response
    {
        return Inertia::render('User/Photo/Create.vue');
    }
}
