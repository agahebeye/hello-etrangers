<?php

namespace App\Http\Actions;

use App\Models\Adress;
use Illuminate\Http\Request;

class StoreDocumentAction
{
    public function handle(Request $request): void
    {
        $adress = Adress::query()->firstOrCreate(['location' => $request->adress]);
        $role =  request()->user()->roles()->first();

        $user = $role->value('name') == 'Admin'
            ? User::query()->create($request->safe()->only(['firstname', 'lastname']))
            : request()->user();

        $adress->users()->save($user);
        $user->document()->create($request->safe()->except(['firstname', 'lastname', 'adress']));
    }
}
