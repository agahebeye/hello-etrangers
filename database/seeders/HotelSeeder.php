<?php

namespace Database\Seeders;

use App\Models\Adress;
use App\Models\City;
use App\Models\Hotel;
use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class HotelSeeder extends Seeder
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
                'room_count' => fake()->numberBetween(20, 60),
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
            ]
        ];

        $bujumburaCity = City::query()->firstWhere('name', 'Bujumbura');

        foreach ($hotels as $hotel) {
            $hotelAttributes = Arr::except($hotel, ['photos', 'adress']);
            $adressAttributes = $hotel['adress'];
            $photos = $hotel['photos'];

            $newHotel = Hotel::factory()
                ->for($bujumburaCity)
                ->has(Adress::factory()->state($adressAttributes))
                ->create($hotelAttributes);

            Photo::factory()->for($newHotel, 'photoable')->state(
                new Sequence(fn ($sequence) => ['src' => $photos[$sequence->index]])
            )->create();
        }
    }
}
