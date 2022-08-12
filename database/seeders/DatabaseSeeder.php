<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Hotel;
use App\Models\Market;
use App\Models\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::create([
            ['name' => 'SuperAdmin'],
            ['name' => 'Admin'],
            ['name' => 'Commercant'],
            ['name' => 'Etudiant']
        ]);

        City::factory(10)->has(Market::factory())
            ->has(Hotel::factory())
            ->has(University::factory()->hasFaculties(3))
            ->create();
    }
}
