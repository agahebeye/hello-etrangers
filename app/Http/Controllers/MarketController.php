<?php

namespace App\Http\Controllers;

use App\Models\Market;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware('web')]
class MarketController
{
    /**
     * show single market
     */

    #[Get(uri: '/markets/{market}', name: 'markets.show')]
    public function show(Market $market): \Inertia\Response
    {
        return inertia()->render(
            'Markets/Show',
            ['market' => fn () => $market->load(['photos'])]
        );
    }
}
