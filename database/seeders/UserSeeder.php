<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
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
    }
}
