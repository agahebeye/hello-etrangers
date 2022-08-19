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
        $hotels = [
            [
                'name' => 'Alexestel',
                'website_url' => fake()->domainName(),
                'motto' => fake()->word(),
                'photos' => [
                    'https://sncdn.com/imagecache/db/id/3932887/6651188a.jpg',
                    'https://p.bookcdn.com/data/Photos/Big/6050/605068/605068569/Alexestel-Hotel-photos-Exterior-Alexestel-Hotel.JPEG',
                    'https://sncdn.com/imagecache/db/id/3932887/6651187a.jpg',
                    'https://www.hotel-board.com/picture/alexestel-hotel-hotel-11240335.jpg',
                    'https://www.hotel-board.com/picture/alexestel-hotel-hotel-11240334.jpg'
                ],
                'adress' => [
                    'avenue' => 'Avenue Muyinga',
                    'tel' => fake()->phoneNumber(),
                    'postal_code' => fake()->postcode()
                ],
                [
                    'name' => 'Martha Hotel',
                    'website_url' => fake()->domainName(),
                    'motto' => fake()->word(),
                    'photos' => [
                        'https://i.ytimg.com/vi/lxyAY7fxsTo/mqdefault.jpg',
                        'https://static.readytotrip.com/upload/information_system_24/1/6/8/item_1686816/photo_29752307.jpg',
                        'https://img.directhotels.com/bi/bujumbura/martha-hotel/3.jpg',
                        'https://static.readytotrip.com/upload/information_system_24/1/6/8/item_1686816/photo_29752303.jpg',
                        'https://content.r9cdn.net/rimg/himg/3d/9f/58/expediav2-17487119-3b8bcdb6_z-724972.jpg?width=500&height=350&xhint=500&yhint=357&crop=true'
                    ],
                    'adress' => [
                        'avenue' => '84 Chaussee Prince Louis Rwagasore',
                        'tel' => '22 27 33 33',
                        'postal_code' => '2551'
                    ],
                ],
            ], [
                'name' => 'Roca Golf Hotel',
                'website_url' => fake()->domainName(),
                'motto' => fake()->word(),
                'photos' => [
                    'https://cf.bstatic.com/xdata/images/hotel/max1024x768/43019516.jpg?k=d4d1e92182220b9160f830348023ecfb93f60811c9598bed9afa05c6604dba64&o=&hp=1',
                    'http://dimg04.c-ctrip.com/images/20031a0000019lidm79C6.jpg',
                    'https://q-xx.bstatic.com/xdata/images/hotel/840x460/43019523.jpg?k=9f55a615668abb5346856807b4113fb6c86cb3eff4e08fc78421e9847b83d718&o=',
                    'https://x.cdrst.com/foto/hotel-sf/6172a/granderesp/roca-golf-hotel-habitacion-bd2b7b9.jpg',
                ],
                'adress' => [
                    'avenue' => 'Avenue de la Tanzanie',
                    'tel' => fake()->phoneNumber(),
                    'postal_code' => fake()->postcode()
                ],
            ],
            [
                'name' => 'Kiriri Garden Hotel',
                'website_url' => fake()->domainName(),
                'motto' => fake()->word(),
                'photos' => [
                    'https://cf.bstatic.com/xdata/images/hotel/max500/265608935.jpg?k=b54a5ccd1fd107fd4dbb8d987ef2da970f10b4e55152e01485faeea8fe1da602&o=&hp=1',
                    'https://kiririgardenhotel.com/wp-content/uploads/2020/09/IMG_9339-scaled.jpg',
                    'https://www.kayak.com/rimg/himg/4c/ef/26/expediav2-20582976-5aae4383_z-052329.jpg?width=1366&height=768&crop=tru',
                    'https://media-cdn.tripadvisor.com/media/photo-m/1280/1c/35/cc/b0/kiriri-garden-hotel.jpg',
                    'https://q-xx.bstatic.com/xdata/images/hotel/840x460/265608966.jpg?k=f99eff06d60f3a8063555586a904c9548d3bfeaa7dca998f5fad57b5c94373d6&o='
                ],
                'adress' => [
                    'avenue' => 'Avenue Belvédère, Kiriri',
                    'tel' => fake()->phoneNumber(),
                    'postal_code' => fake()->postcode()
                ],
            ],
            [
                'name' => 'Best Outlook Hotel',
                'website_url' => fake()->domainName(),
                'motto' => fake()->word(),
                'photos' => [
                    'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/10/bb/a5/36/best-outlook-hotel.jpg?w=1000&h=-1&s=1',
                    'https://media-cdn.tripadvisor.com/media/photo-s/10/bb/a4/8f/best-outlook-hotel.jpg',
                    'https://cf.bstatic.com/xdata/images/hotel/max1024x768/50214628.jpg?k=a591d72fe6ea6c9e1d50441200732d1bb6c27ca008888db0fab74b5f2cc3a17b&o=&hp=1',
                    'https://images.trvl-media.com/hotels/7000000/6660000/6658700/6658687/5f8ce16d.jpg?impolicy=resizecrop&rw=670&ra=fit',
                    'https://media-cdn.tripadvisor.com/media/photo-s/08/11/85/c7/best-outlook-hotel.jpg'
                ],
                'adress' => [
                    'avenue' => 'Avenue Du Princ Louis Rwagasore No 125',
                    'tel' => fake()->phoneNumber(),
                    'postal_code' => fake()->postcode()
                ],
            ],
            [
                'name' => 'Le Panoramique Hotel by Celexon',
                'website_url' => fake()->domainName(),
                'motto' => fake()->word(),
                'photos' => [
                    'https://cf.bstatic.com/xdata/images/hotel/max1024x768/313825461.jpg?k=e9708f349e8e397f3045507364296f3b41548779a90b8b6eee38d99279e98eb0&o=&hp=1',
                    'https://content.r9cdn.net/rimg/kimg/00/be/bcc5ec72-59118603.jpg?width=1200&height=630&crop=true',
                    'https://ak-d.tripcdn.com/images/22030r000000gxvx76A04_R_1100_824_R5_Q70_D.jpg',
                    'https://media-cdn.tripadvisor.com/media/photo-s/07/b6/28/19/le-panoramique-hotel.jpg',
                    'https://cf.bstatic.com/xdata/images/hotel/max1024x768/313733832.jpg?k=9d0a8683391e8cf623e331828c75900d50ce44d99e00457037bec6c9197082ab&o=&hp=1'
                ],
                'adress' => [
                    'avenue' => 'Avenue de Ja Jrr, No 7',
                    'tel' => fake()->phoneNumber(),
                    'postal_code' => fake()->postcode()
                ],
            ],
        ];

        $bujumburaCity = City::query()->firstWhere('name', 'Bujumbura');

        foreach ($hotels as $hotel) {


            $newHotel = Hotel::factory()
                ->for($bujumburaCity)
                ->has(Adress::factory()->state($hotel['adress']))
                ->create(['name' => $hotel['name'], 'website_url' => $hotel['website_url']]);


            foreach ($hotel['photos'] as $photo) {
                $newHotel->photos()->create(['src' => $photo]);
            }
        }
    }
}
