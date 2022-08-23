<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
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

        \App\Models\User::factory()->create([
            'first_name' => 'Franssen',
            'last_name' => 'Ngoie kabamba',
            'email' => 'franseen@example.com',
            'password' => 'introuvable',
            'role_id' => 2,
        ]);

        \App\Models\User::factory()->create([
            'first_name' => 'Aboubakar',
            'last_name' => 'Gahebeye',
            'email' => 'gahebeye@example.com',
            'password' => 'introuvable',
            'role_id' => 3,
        ]);


        // etudiants
        User::factory(5)->has(Document::factory()->validated())->create(['role_id' => 2]);
        User::factory(3)->has(Document::factory())->create(['role_id' => 2]);
        User::factory(2)->has(Document::factory()->rejected())->create(['role_id' => 2]);

        User::factory(40)->has(Document::factory()->state(
            new Sequence(['validated_at' => now()], ['rejected_at' => now()])
        ))->state(new Sequence(['role_id' => 2], ['role_id' => 3]))
            ->create();

        // traders
        User::factory(20)->has(Document::factory())->create(['role_id' => 3]);
    }
}
