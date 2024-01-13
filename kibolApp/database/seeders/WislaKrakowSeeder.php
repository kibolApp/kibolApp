<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WislaKrakowSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Ruch Chorzów"];

        $negativeClubs = [
            "Cracovia", "Lech Poznań", "Arka Gdynia", "GKS Tychy", "Sandecja Nowy Sącz", "Tarnovia Tarnów",
            "Hutnik Kraków", "Górnik Zabrze", "GKS Katowice", "Legia Warszawa", "Zagłębie Sosnowiec",
            "Radomiak Radom", "ŁKS Łódź", "Korona Kielce", "Motor Lublin", "Śląsk Wrocław", "Lechia Gdańsk",
            "Zawisza Bydgoszcz", "Włocłavia Włocławek", "Olimpia Elbląg", "Jagiellonia Białystok", "Pogoń Szczecin",
            "Polonia Warszawa", "Wisła Płock", "Zagłębie Lubin", "Miedź Legnica", "Chrobry Głogów",
            "Polonia Bytom", "ROW Rybnik", "Raków Częstochowa", "BKS Stal Bielsko-Biała", "Góral Żywiec",
            "Czuwaj Przemyśl", "JKS Jarosław", "Wisłoka Dębica", "Resovia Rzeszów", "Stal Mielec",
            "Siarka Tarnobrzeg", "Czarni Jasło", "Górnik Łęczna", "Chełmianka Chełm", "Hetman Zamość",
            "KSZO Ostrowiec Św.", "Naprzód Jędrzejów", "GKS Bełchatów", "Beskid Andrychów", "Podbeskidzie Bielsko-Biała",
            "Odra Opole", "Apator Toruń", "Chojniczanka Chojnice", "Gwardia Koszalin"
        ];
        $coordinates = [
            ["lat" => 50.49798692471788, "lng" => 19.190108777798855],
            ["lat" => 49.87281513312948, "lng" => 19.11684784755377],
            ["lat" => 49.77206198531857, "lng" => 19.414704366706076],
            ["lat" => 49.83328274319581, "lng" => 20.238030033659356],
            ["lat" => 50.487818029479, "lng" => 20.233995505086142],
            ["lat" => 50.57616613228245, "lng" => 19.79342364432219],
            ["lat" => 50.49798692471788, "lng" => 19.190108777798855],
        ];


        $clubs = [
            [
                'name' => "Wisła Kraków",
                'url_logo' => "https://i.imgur.com/LgnZzdC.png",
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
        DB::table('wislakrakow')->insert($clubs);
    }
}
