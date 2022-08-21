<?php

namespace Database\Seeders;


use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            CitySeeder::class,
            HotelSeeder::class,
            UniversitySeeder::class,
            MarketSeeder::class,
            UserSeeder::class,
        ]);
    }
}
