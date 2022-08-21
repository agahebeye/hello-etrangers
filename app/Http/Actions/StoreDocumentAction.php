<?php

namespace App\Http\Actions;

use App\Models\User;
use App\Models\Adress;
use Illuminate\Http\Request;

class StoreDocumentAction
{
    public function handle(Request $request): void
    {
        $adress = Adress::query()->firstOrCreate(['avenue' => $request->adress]);

        $user = $request->user()->role->name == 'Administrateur'
            ? User::query()->create($request->safe()->only(['first_name', 'last_name']))
            : request()->user();

        $adress->users()->save($user);

        $user->document()->create($request->safe()->except(['first_name', 'last_name', 'adress']));
    }
}
