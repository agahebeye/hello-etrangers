<?php

namespace App\Http\Actions;

use App\Models\Adress;
use Illuminate\Http\Request;

class StoreDocumentAction
{
    public function handle(Request $request)//: void
    {
        $adress = Adress::query()->firstOrCreate(['location' => $request->adress]);

        return $request->all();

        $user = $request->user()->role->name == 'Admin'
            ? User::query()->create($request->safe()->only(['first_name', 'last_name']))
            : request()->user();

        $adress->users()->save($user);
        $user->document()->create($request->safe()->except(['firstname', 'lastname', 'adress']));
    }
}
