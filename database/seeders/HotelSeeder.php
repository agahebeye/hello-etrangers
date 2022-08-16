<?php

namespace Database\Seeders;

use App\Models\Adress;
use App\Models\City;
use App\Models\Hotel;
use App\Models\Localisation;
use App\Models\Photo;
use Database\Factories\AdressFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::factory()
            ->for(City::factory())
            ->for(Adress::factory()->state([]))
            ->has(Photo::factory())
            ->has(Localisation::factory())
            ->create();
    }
}
