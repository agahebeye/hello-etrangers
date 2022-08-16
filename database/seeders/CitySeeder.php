<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Hotel;
use App\Models\Photo;
use App\Models\University;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'name' => 'Bujumbura',
                'superficies' => '127',
                'population' => 374809,
                'photos' => [
                    'https://cdn.britannica.com/63/125063-050-332A70CC/Bujumbura-Burundi.jpg',
                    'https://upload.wikimedia.org/wikipedia/commons/2/28/Bujumbura_-_Flickr_-_Dave_Proffer_%285%29.jpg',
                    'https://petnahafricatours.com/wp-content/uploads/2020/05/Bujumbura-Burundi.jpg',
                    'https://i.ytimg.com/vi/GCtxyC5KYhg/maxresdefault.jpg',
                    'https://www.skyscrapercity.com/cdn-cgi/image/format=auto,onerror=redirect,width=1920,height=1920,fit=scale-down/https://www.skyscrapercity.com/attachments/img_0585-jpg.292716/'
                ]
            ],
            [
                'name' => 'Gitega',
                'superficies' => '22',
                'population' => fake()->numberBetween(50_000, 500_0000),
                'photos' => [
                    'https://i2.wp.com/comedytravelwriting.com/wp-content/uploads/2019/02/Gitega-city.jpeg?resize=886%2C625&ssl=1',
                    'https://upload.wikimedia.org/wikipedia/commons/0/07/Gitega_-_Flickr_-_Dave_Proffer.jpg',
                    'https://www.petitfute.com/medias/photo/900_600/c7/13/147183-gitega-le-boma-allemand.jpg',
                    'https://scontent.fbjm1-1.fna.fbcdn.net/v/t1.6435-9/110210448_3226992490752921_3411717715698313160_n.jpg?stp=dst-jpg_p526x296&_nc_cat=107&ccb=1-7&_nc_sid=8024bb&_nc_ohc=uH3irVTr8GAAX_1I1yq&_nc_ht=scontent.fbjm1-1.fna&oh=00_AT8BE5RASHQ-CHV8epY-J9MfgyrIASbq_XB6xMH1iaothw&oe=6320CC4D',
                    'http://www.provincegitega.gov.bi/images/Stade_ingoma_yose.jpg'
                ]
            ],
            [
                'name' => 'Ngozi',
                'superficies' => '1474',
                'population' => fake()->numberBetween(50_000, 500_0000),
                'photos' => [
                    'https://pbs.twimg.com/media/EQAzKYRXsAAk2Qr.jpg',
                    'https://i.ytimg.com/vi/PNwpfG3eClg/maxresdefault.jpg',
                    'https://rtnb.bi/fr/imagertnbbuja/album/3-1/106//iiiiii.jpg',

                ]
            ],
            [
                'name' => 'Rumonge',
                'superficies' => '1080',
                'population' => fake()->numberBetween(50_000, 500_0000),
                'photos' => [
                    'https://images.squarespace-cdn.com/content/v1/594c36923a04118f1f1568ea/f92add25-9f2e-49d4-bf6c-6debd7091c93/Blue+Bay+2+copy.jpg',
                    'https://travelcravingsdotcom1.files.wordpress.com/2014/11/1472856_183001878558910_939814126_n.jpg',
                    'https://isanganiro.org/wp-content/uploads/2019/08/arton11881.jpg',
                    'https://www.sosmediasburundi.org/wp-content/uploads/2019/09/R-1900x1069_c.jpeg',
                ]
            ],
            [
                'name' => 'Kayanza',
                'superficies' => '1233',
                'population' => fake()->numberBetween(50_000, 500_0000),
                'photos' => [
                    'https://www.sosmediasburundi.org/wp-content/uploads/2019/12/KAYANZA-1900x1069_c.jpeg',
                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaqzrJM-1NWWE9f_5xVqizqyMZ9YqJ7AF-Ng6MnJ2EgMqXj-y8vtJAav6OL2dNumahNN0&usqp=CAU',
                    'https://burundi-eco.com/wp-content/uploads/2021/10/Kayanza-Panorama.jpg',
                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdjfGwbdTjIBE0kNhcf-jEKeTYFW8ccAhN5ykvZOmXZS_t-_SAsLbikTYWpabXYzDQxm8&usqp=CAU',

                ]
            ],
            [
                'name' => 'Muyinga',
                'superficies' => '1836',
                'population' => fake()->numberBetween(50_000, 500_0000),
                'photos' => [
                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaAkZsW0Gk-6qbE7t5N89ezv7L3bCr7z3WzjThPGyC-KKyCHqUgECZxwWu6KrBhWBic2s&usqp=CAU',
                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXPOTAJ-HUewCEo9A4jkxDLaeMi1G5aHVUGTrTf55P_yTtrsNpinvcJtouS11sqiNTlng&usqp=CAU',
                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNDLy_BZ-rRMnr_c41kRyjJK_nyW2e--Nn8ydHBmjEHdb-6a99oOqTyQrZYFG9dBZC9Bs&usqp=CAU',
                ]
            ],
            [
                'name' => 'Cibitoke',
                'superficies' => '1636',
                'population' => fake()->numberBetween(50_000, 500_0000),
                'photos' => [
                    'https://i.ytimg.com/vi/YnyJVxBW8l8/maxresdefault.jpg',
                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTGwcjdqYnEIYps8Ip4K6ZWprRIKw39XtXZ-K3dx0IG8nj2ufoudhgdPIsWKIW7T30cwI&usqp=CAU',
                    'https://fre.universitiesintheworld.com/images/universites-accreditees-en-burundi/p-universites-en-province-de-cibitoke.jpg',
                    'https://abisezeranocom.files.wordpress.com/2018/01/fc07fa0b-6e6f-4719-99a6-540ba21190d4-1205-00000208b8a1c539.jpg',
                    'https://fre.universitiesintheworld.com/images/universites-meilleures-en-burundi/universites-en-cibitoke.jpg'
                ]
            ],
            [
                'name' => 'Rutana',
                'superficies' => '1959',
                'population' => fake()->numberBetween(50_000, 500_0000),
                'photos' => [
                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQt3JJBvFXbqBAM_V29PpaqD-UuS9CKUmLzWQ&usqp=CAU',
                    'https://static1.mclcm.net/iod/images/v2/113/citytheque/localite_104_32/800x360_100_300_000000x10x0.jpg',
                    'https://media-cdn.tripadvisor.com/media/photo-s/18/50/e8/25/karera-waterfalls.jpg',
                    'https://dynamic-media-cdn.tripadvisor.com/media/daodao/photo-o/12/be/a5/6d/caption.jpg?w=700&h=-1&s=1',
                    'https://upload.wikimedia.org/wikipedia/commons/5/5d/Bridge_in_Rutana%2CBurundi.jpg'
                ]
            ],
            [
                'name' => 'Ruyigi',
                'superficies' => '2339',
                'population' => fake()->numberBetween(50_000, 500_0000),
                'photos' => [
                    'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/RuyigiHopital.JPG/280px-RuyigiHopital.JPG',
                    'https://mapio.net/images-p/20570352.jpg',
                    'https://isanganiro.org/wp-content/uploads/2019/08/arton7015.jpg, https://img.over-blog-kiwi.com/2/64/79/06/20180602/ob_2ae9c1_008.jpg',
                    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm8QU_-JwsKwl07ogBwN3f3K4LzPrPE2QYjE4tWLsPvyRFXj7fqQpdiFHha7DtnOShaic&usqp=CAU'
                ]
            ],
            [
                'name' => 'Bururi',
                'superficies' => '1645',
                'population' => fake()->numberBetween(50_000, 500_0000),
                'photos' => [
                    'https://www.sosmediasburundi.org/wp-content/uploads/2020/01/BURURI.jpeg',
                    'https://pbs.twimg.com/profile_images/1287066657362518016/ggWjSA79_400x400.jpg',
                    'http://finances.gov.bi/wp-content/uploads/2021/04/IMG-20210331-WA0027.jpg',
                    'https://burundi-agnews.org/wp-content/uploads/2017/05/bdi_bururi_burundi_2016a.jpg',
                    'https://media-cdn.tripadvisor.com/media/photo-s/19/5c/49/f5/eco-friendly-travel-for.jpg'
                ]
            ]
        ];

        collect($cities)->each(function ($city) {
            $city = City::factory()
                ->has(Hotel::factory())
                ->has(University::factory()->hasFaculties(3))
                ->create(Arr::except($city, 'photos'));

            $city->photos()->create(collect($city['photos'])->map(fn ($photo) => ['src' => $photo]));
        });
    }
}
