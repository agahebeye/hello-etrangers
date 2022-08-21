<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

        \App\Models\User::factory()->create([
            'first_name' => 'Jehdai',
            'last_name' => 'Bugale',
            'email' => 'test@example.com',
            'password' => 'introuvable',
            'role_id' => 1,
        ]);


        // etudiants
        User::factory(20)->create(['role_id' =>2]);

        // traders
        User::factory(20)->create(['role_id' => 3]);
    }
}
