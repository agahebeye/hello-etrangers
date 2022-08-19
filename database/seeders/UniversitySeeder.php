<?php

namespace Database\Seeders;

use App\Models\Adress;
use App\Models\Faculty;
use App\Models\University;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $universities = [
            [
                'name' => 'Université Lumière de Bujumbura',
                'website_url' => 'http://ulbu.bi/',
                'email' => 'infos@ulbu.bi',
                'devise' => 'Pepiniere des cadres reponsables et competents',
                'photo_url' => 'https://pbs.twimg.com/media/FJeU8RPX0AI6FZG?format=jpg&name=4096x4096',
                'adress' => [
                    'tel' => '(+257) 22 23 55 49',
                    'postal_code' => '1368'
                ],
                'faculties' => [
                    ['name' => 'Faculté des Sciences de la Communication'],
                    ['name' => 'Faculté de Droit'],
                    ['name' => 'Faculté des Sciences économiques et gestions'],
                    ['name' => 'Faculté des Sciences et technologies'],
                    ['name' => 'Faculté de Théologie'],
                    ['name' => 'Faculté de psychologie'],
                    ['name' => "Faculté d'Agronomie et de développement rural"],
                    ['name' => 'Faculté des Sciences de la santé'],
                ],
            ]
        ];

        foreach ($universities as $university) {
            $newUniversity = University::factory()
                ->has(Adress::factory()->state($university['adress']))
                ->create(Arr::except($university, ['adress', 'faculties']));

            foreach ($university['faculties'] as $faculty) {
                $newUniversity->faculties()->attach((Faculty::create($faculty))->id);
            }
        }
    }
}
