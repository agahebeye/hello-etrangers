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

         $this->call(CitySeeder::class);
    }
}
