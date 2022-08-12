<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Role;
use App\Models\Hotel;
use App\Models\Market;
use App\Models\University;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $role = Role::create([
            'name' => 'Administrateur',
        ]);

        $admin = \App\Models\User::factory()->create([
             'first_name' => 'Jehdai',
             'last_name' => 'Bugale',
             'email' => 'test@example.com',
             'password' => 'introuvable',
             'role_id' => $role->id
         ]);

        City::factory(10)->has(Market::factory())
            ->has(Hotel::factory())
            ->has(University::factory()->hasFaculties(3))
            ->create();
    }
}
