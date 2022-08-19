<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'photo' => 'https://pbs.twimg.com/media/FJeU8RPX0AI6FZG?format=jpg&name=4096x4096',
                'adress' => [
                    'tel' => '(+257) 22 23 55 49',
                    'postal_code' => '1368'
                ],
                'faculties' => [
                    'Faculté des Sciences de la Communication',
                    'Faculté de Droit',
                    'Faculté des Sciences économiques et gestions',
                    'Faculté des Sciences et technologies',
                    'Faculté de Théologie',
                    'Faculté de psychologie',
                    "Faculté d'Agronomie et de développement rural",
                    'Faculté des Sciences de la santé',
                ],
            ]
        ];

        foreach ($universities as $university) {


            $newUniversity = university::factory()
                ->has(Adress::factory()->state($university['adress']))
                ->create(['name' => $university['name'], 'website_url' => $university['website_url']]);


            foreach ($university['photos'] as $photo) {
                $newUniversity->photos()->create(['src' => $photo]);
            }
        }
    }
}
