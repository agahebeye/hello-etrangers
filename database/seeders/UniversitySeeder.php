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
            ],[
                'name' => 'Université du Lac Tanganyika',
                'website_url' => 'http://www.ult.bi/',
                'email' => 'ultbuja@yahoo.fr',
                'devise' => 'Le savoir, le savoir-faire et le savoir vivre',
                'photo_url' => 'https://ult.bi/sites/default/files/gallery/DSC05488_0.JPG',
                'adress' => [
                    'tel' => '+257 22 24 36 45',
                    'postal_code' => fake()->postcode(),
                ],
                'faculties' => [
                    ['name' => "Faculté des Sciences de Gestion et d'Économie Appliquée"],
                    ['name' => 'Faculté de Droit'],
                    ['name' => 'Facultés des Sciences Sociales, Politiques et Administratives'],
                    ['name' => 'Faculté d’Informatique'],
                ],
            ],[
                'name' => 'Université Sagesse d’Afrique',
                'website_url' => 'https://www.usa.edu.bi/',
                'email' => 'usagesse@gmail.com',
                'devise' => "La Sagesse et l'Intelligence pour la Promotion de l'Excellence",
                'photo_url' => 'http://www.usa.edu.bi/wp-content/uploads/2021/08/vie4-slider.jpg',
                'adress' => [
                    'tel' => '0025722258899',
                    'postal_code' => fake()->postcode(),
                ],
                'faculties' => [
                    ['name' => "Faculté d’Economie, de Gestion et d’Administration des Affaires"],
                    ['name' => 'Faculté des Sciences et Technologies'],
                    ['name' => 'Faculté de droit'],
                ],
            ], [
                'name' => "université espoir d'afrique",
                'website_url' => 'https://www.hopeafricauniversity.org/',
                'email' => 'inofO@hopeafricauniversity.org',
                'devise' => "All Truth is God's Truth",
                'photo_url' => 'https://7sur7.cd/sites/default/files/styles/1024x768/public/2019-09/IMG-20190923-WA0062.jpg?itok=LiwKTFnK',
                'adress' => [
                    'tel' => '  (+257)22 23 79 73 / 22 23 79 73',
                    'postal_code' => '238'
                ],
                'faculties' => [
                    ['name' => 'Faculté des Lettres et des Sciences'],
                    ['name' => 'Faculté des Sciences de l’Éducation'],
                    ['name' => 'Faculté des Affaires et des Sciences Professionnelles'],
                    ['name' => 'Faculté des Sciences de la santé'],
                    ['name' => 'Faculté d’Ingénierie et de Technologie'],
                ],
            ]
        ];

        foreach ($universities as $university) {
            $newUniversity = University::factory()
                ->has(Adress::factory()->state($university['adress']))
                ->create(Arr::except($university, ['adress', 'faculties', 'photo_url']));

            $newUniversity->photo()->create(['src' => $university['photo_url']]);

            foreach ($university['faculties'] as $faculty) {
                $newUniversity->faculties()->attach((Faculty::create($faculty))->id);
            }
        }
    }
}
