<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware(['web'])]
class DashboardController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    #[Get(uri:'/dashboard', name:'dashboard', middleware:['auth'])]
    public function __invoke(Request $request): \Inertia\Response
    {
        return Inertia::render('Dashboard', [
            'latestDocuments' => Document::query()->with(['user' => ['adress', 'role']])->latest()->take(5)->get(),
            'latestStudents' => User::query()->with(['document'])->ofRole('Etudiant')->latest()->take(5)->get(),
            'latestTraders' => User::query()->with(['document'])->latest()->ofRole('Commerçant')->take(5)->get(),
        ]);
    }
}
