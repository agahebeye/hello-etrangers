<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ForeignerController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $foreigners = User::get();

        return inertia()->render('Foreigners/Index', [
            'foreigners' => $foreigners
        ]);
    }
}
