<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArkaGdyniaSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = [
            "Cracovia", "Lech Poznań", "Polonia Bytom", "Zagłębie Lubin", "KSZO Ostrowiec Św.", "Gwardia Koszalin"
        ];

        $negativeClubs = [
            "Lechia Gdańsk", "Śląsk Wrocław", "Motor Lublin", "Wisła Kraków", "Ruch Chorzów", "Widzew Łódź",
            "Elana Toruń", "Legia Warszawa", "Stomil Olsztyn", "Pogoń Szczecin", "Bałtyk Gdynia", "Jagiellonia Białystok",
            "Olimpia Elbląg", "Radomiak Radom", "Wisła Płock", "Korona Kielce", "Unia Tarnów", "Zagłębie Sosnowiec",
            "Górnik Zabrze", "GKS Katowice", "Piast Gliwice", "ROW Rybnik", "Raków Częstochowa", "Miedź Legnica",
            "Górnik Łęczna", "Hetman Zamość", "KKS Kalisz", "Jeziorak Iława", "Kotwica Kołobrzeg", "Gryf Słupsk",
            "Czarni Słupsk", "Chojniczanka Chojnice", "Bytovia Bytów", "KP Starogard Gdański", "Stal Stalowa Wola"
        ];
        $coordinates = [
            ["lat" => 54.48139824660586, "lng" => 18.53556849612343],
            ["lat" => 54.72663787934056, "lng" => 19.162572874169854],
            ["lat" => 54.90984164913908, "lng" => 18.197811673913066],
            ["lat" => 54.669758482172426, "lng" => 16.730340254108427],
            ["lat" => 54.447854902785735, "lng" => 16.350149768800804],
            ["lat" => 54.30222075020012, "lng" => 16.20098984609541],
            ["lat" => 54.41222320182757, "lng" => 16.761803365011417],
            ["lat" => 54.24146877292418, "lng" => 16.788163267589823],
            ["lat" => 54.48139824660586, "lng" => 18.53556849612343]

        ];

        $clubs = [
            [
                'name' => "Arka Gdynia",
                'url_logo' => asset('arkagdynia.png'),
                'positive' => null,
                'negative' => null,
                'lat' => null,
                'lng' => null,
            ],
        ];
        foreach ($coordinates as $coordinate) {
            $clubs[] = [
                'name' => null,
                'url_logo' => null,
                'positive' => null,
                'negative' => null,
                'lat' => $coordinate['lat'],
                'lng' => $coordinate['lng'],
            ];
        };


        foreach ($positiveClubs as $club) {
            $clubs[] = ['name' => null, 'url_logo' => null, 'positive' => $club, 'negative' => null, 'lat' => null, 'lng' => null,];
        }

        foreach ($negativeClubs as $club) {
            $clubs[] = ['name' => null, 'url_logo' => null, 'positive' => null, 'negative' => $club, 'lat' => null, 'lng' => null,];
        }

        DB::table('arkagdynia')->insert($clubs);
    }
}
