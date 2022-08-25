<?php

namespace App\Http\Actions;

use App\Models\User;
use Illuminate\Http\Request;

class StoreDocumentAction
{
    public function handle(Request $request): void
    {
        $user = $request->user()->role->name == 'Administrateur'
            ? User::query()->create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'role_id' => $request->profession
            ])
            : request()->user();

        $user->adress()->updateOrCreate([], ['avenue' => $request->adress]);

        $user->document()->create($request->safe()->except(['first_name', 'last_name', 'adress']));

    }
}
