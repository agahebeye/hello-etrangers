<?php

namespace Database\Seeders;

use App\Models\Market;
use Illuminate\Database\Seeder;

class MarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $markets = [
            [
                'name' => 'Kamenge',
                'photos' => [
                    ['src' => 'https://jimbere.org/wp-content/uploads/2021/01/kamenge-2-1000x600.jpeg'],
                    ['src' => 'https://lerenouveau.digital/wp-content/uploads/2021/11/marche.jpg'],
                    ['src' => 'https://burundi-forum.org/wp-content/uploads/2021/11/bdi_burundi_marchekamenge_ntahangwa_01_27112021_ntarerutshatsihouse.jpg'],
                    ['src' => 'https://www.burundi-forum.org/wp-content/uploads/2021/11/bdi_burundi_marchekamenge_ntahangwa_01_27112021_ntarerutshatsihouse-1024x500.jpg'],
                    ['src' => 'https://isanganiro.org/wp-content/uploads/2019/08/arton9527.jpg']
                ]
            ],
            [
                'name' => 'Kinindo',
                'photos' => [
                    ['src' => 'https://tanganyikablog.files.wordpress.com/2015/06/isoko-kinindo.jpg'],
                    ['src' => ' https://fastly.4sqi.net/img/general/600x600/25483508_s4fJ9mVxYZ4EZp0emUXTJsN1NhvPJA7ZLnxsgWew_90.jpg'],
                    ['src' => 'https://lerenouveau.digital/wp-content/uploads/2021/09/isoko.png'],
                    ['src' => 'https://burundi-eco.com/wp-content/uploads/2020/06/kinindo.jpg'],
                    ['src' => 'https://isanganiro.org/wp-content/uploads/2019/08/arton10620.jpg']
                ]
            ],
            [
                'name' => 'kanyosha',
                'photos' => [
                    ['src' => 'https://burundi-agnews.org/wp-content/uploads/2021/03/bdi_burundi_marchedeKANYOSHA_03_18032021_JournalLeRenouveau.jpg'],
                    ['src' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7GDDO_TWIMhzN7CkX9GpOuG1YUzdHBhBGiCcT8CNYeH0F0fZnmBK0ZPp0THFnxidNJ50&usqp=CAU'],
                    ['src' => 'https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_2048,h_1152/https://burundi-agnews.org/wp-content/uploads/2021/02/bdi_burundi_marcheKanyosha_bujumbura_03_05032021_bujumburamairie-scaled.jpg'],
                    ['src' => 'https://burundi-forum.org/wp-content/uploads/2021/03/bdi_burundi_marchedeKANYOSHA_02_18032021_JournalLeRenouveau.jpg'],
                ]
            ],
            [
                'name' => 'Sioni',
                'photos' => [
                    ['src' => ' https://www.bujumburacitymarket.com/slideshow/slide_7.jpg'],
                    ['src' => 'https://burundi-eco.com/wp-content/uploads/2021/07/BCM.jpg'],
                    ['src' => 'https://www.sosmediasburundi.org/wp-content/uploads/2022/01/Lentree-du-marche-Bujumbura-city-market-1900x1069_c.jpg'],
                ]
            ],
            [
                'name' => 'Musaga',
                'photos' => [
                    ['src' => 'https://burundi-eco.com/wp-content/uploads/2020/06/musaga.jpg,  https://i.ytimg.com/vi/yR5OLGRZRdI/hqdefault.jpg'],
                    ['src' => 'http://lerenouveau.digital/wp-content/uploads/2022/07/IMG_3450.jpg'],
                ]
            ],

        ];

        collect($markets)->each(function ($market) {
            $cityModel = Market::factory()
                ->create(['name' => $market['name']]);

            $cityModel->photos()->createMany($market['photos']);

        });
    }
}
