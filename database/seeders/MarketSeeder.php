<?php

namespace Database\Seeders;

use App\Models\Market;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $markerts = [];

        Market::factory()
            ->count(10)
            ->state(new Sequence(
                fn ($sequence) => ['name' => $markerts]
            ));
    }
}
