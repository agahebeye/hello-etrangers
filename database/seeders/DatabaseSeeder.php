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
        Role::query()->insertMany(
            ['name' => 'Administrateur'],
            ['name' => 'Etudiant'],
            ['name' => 'Commerçant'],
        );

        \App\Models\User::factory()->create([
            'first_name' => 'Jehdai',
            'last_name' => 'Bugale',
            'email' => 'test@example.com',
            'password' => 'introuvable',
            'role_id' => 1,
        ]);

        $this->call([
            CitySeeder::class,
            HotelSeeder::class,
            UniversitySeeder::class,
            MarketSeeder::class,
        ]);
    }
}
