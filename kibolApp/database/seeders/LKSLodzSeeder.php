<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LKSLodzSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = [
            "Zawisza Bydgoszcz", "GKS Tychy", "Lech Poznań"
        ];

        $negativeClubs = [
            "Widzew Łódź", "Ruch Chorzów", "Wisła Kraków", "Elana Toruń", "KKS Kalisz", "Stal Rzeszów",
            "Karpaty Krosno", "Stal Stalowa Wola", "Resovia Rzeszów", "Legia Warszawa", "Zagłębie Sosnowiec",
            "BKS Stal Bielsko-Biała", "Olimpia Elbląg", "Radomiak Radom", "Odra Opole", "Chrobry Głogów",
            "Śląsk Wrocław", "Motor Lublin", "Chełmianka Chełm", "Wisła Płock", "Polonia Warszawa",
            "Stomil Olsztyn", "Jagiellonia Białystok", "Pogoń Szczecin", "Polonia Bydgoszcz", "RKS Radomsko",
            "Ceramika Opoczno", "GKS Katowice", "KS Myszków", "Piast Gliwice"
        ];
        $coordinates = [
            ["lat" => 51.769155891609614, "lng" => 19.449262480897346],
            ["lat" => 52.08960734860412, "lng" => 20.41588058438603],
            ["lat" => 52.2459196153317, "lng" => 19.223583637622852],
            ["lat" => 52.1928037376824, "lng" => 18.49143087784131],
            ["lat" => 51.17321381741908, "lng" => 18.108425851769482],
            ["lat" => 51.01473481107527, "lng" => 19.39286295290836],
            ["lat" => 51.769155891609614, "lng" => 19.449262480897346],
        ];

        $clubs = [
            [
                'name' => "ŁKS Łódź",
                'url_logo' => "https://imgur.com/BJPSl4y.png",
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

        DB::table('lkslodz')->insert($clubs);
    }
}
