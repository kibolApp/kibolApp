<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RadomiakRadomSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Legia Warszawa"];
        $negativeClubs = [
            "Broń Radom", "Powiślanka Lipsko", "Korona Kielce", "KSZO Ostrowiec Św.", "Widzew Łódź", 
            "Ruch Chorzów", "Wisła Kraków", "Elana Toruń", "Polonia Warszawa", "Wisła Płock", 
            "Motor Lublin", "Hetman Zamość", "Chełmianka Chełm", "Górnik Łęczna", "Wisła Puławy", 
            "Avia Świdnik", "Resovia Rzeszów", "Stal Mielec", "Stal Stalowa Wola", "Sandecja Nowy Sącz", 
            "GKS Tychy", "Górnik Zabrze", "GKS Katowice", "GKS Jastrzębie", "Raków Częstochowa", 
            "Śląsk Wrocław", "Lechia Gdańsk", "ŁKS Łódź", "Cracovia", "Lech Poznań", "Arka Gdynia", 
            "Stomil Olsztyn", "Jagiellonia Białystok", "Gwardia Warszawa", "Pilica Białobrzegi", 
            "Miedź Legnica"
        ];
        $coordinates = [
            ["lat" => 52.0707149755722, "lng" => 21.85855126020428],
            ["lat" => 51.876896907467085, "lng" => 20.332394649049263],
            ["lat" => 51.344187872438255, "lng" => 20.115857903836485],
            ["lat" => 51.025889825323446, "lng" => 21.78866158139536],
            ["lat" => 52.0707149755722, "lng" => 21.85855126020428],
        ];

        $clubs = [
            [
                'name' => "Radomiak Radom",
                'url_logo' => "https://i.imgur.com/2nVnU9F.png",
                'positive' => null,
                'negative' => null,
                'lat'=>null,
                'lng'=>null,
            ],
        ];

        foreach ($coordinates as $coordinate) {
            $clubs[]=[
                'name' => null,
                'url_logo' => null,
                'positive' => null,
                'negative' => null,
                'lat' => $coordinate['lat'],
                'lng' => $coordinate['lng'],
            ];
        };

        foreach ($positiveClubs as $club) {
            $clubs[] = ['name' => null, 'url_logo' => null, 'positive' => $club, 'negative' => null, 'lat'=>null,
            'lng'=>null,];
        }

        foreach ($negativeClubs as $club) {
            $clubs[] = ['name' => null, 'url_logo' => null, 'positive' => null, 'negative' => $club, 'lat'=>null,
            'lng'=>null,];
        }
        DB::table('radomiakradom')->insert($clubs);
    }
}
