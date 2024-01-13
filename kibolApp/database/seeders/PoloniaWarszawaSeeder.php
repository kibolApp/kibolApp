<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoloniaWarszawaSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = [];

        $negativeClubs = [
            "Legia Warszawa", "Zagłębie Sosnowiec", "Olimpia Elbląg", "Radomiak Radom", "Hutnik Warszawa",
            "Olimpia Warszawa", "Ursus Warszawa", "Dolcan Ząbki", "Znicz Pruszków", "Świt Nowy Dwór Mazowiecki",
            "Legionovia Legionowo", "Pogoń Siedlce", "Wisła Płock", "Legia Chełmża", "Pogoń Szczecin",
            "Bałtyk Gdynia", "Jagiellonia Białystok", "Motor Lublin", "Hetman Zamość", "Wisła Puławy",
            "KSZO Ostrowiec Św.", "Unia Tarnów", "Ruch Chorzów", "GKS Katowice", "BKS Stal Bielsko-Biała",
            "Raków Częstochowa", "Gwardia Koszalin"
        ];
        $coordinates = [
            ["lat" => 52.147285464629306, "lng" => 20.63063092773467],
            ["lat" => 52.20043099413979, "lng" => 20.831509719447297],
            ["lat" => 52.232854268718, "lng" => 20.95895204731832],
            ["lat" => 52.26412186260367, "lng" => 20.96369949243885],
            ["lat" => 52.2308816688101, "lng" => 21.024284392492547],
            ["lat" => 52.2276330237157, "lng" => 21.04486187708227],
            ["lat" => 52.304389456264715, "lng" => 21.15552563208493],
            ["lat" => 52.459079070696845, "lng" => 21.547890950054892],
            ["lat" => 52.65778034032817, "lng" => 22.448544740106456],
            ["lat" => 52.80067874677539, "lng" => 22.421581638098218],
            ["lat" => 52.89042550663413, "lng" => 22.273082449648314],
            ["lat" => 53.06962901749628, "lng" => 21.895103681832182],
            ["lat" => 53.12645627821391, "lng" => 21.732308282409974],
            ["lat" => 53.02392303468994, "lng" => 21.044013751033674],
            ["lat" => 52.805471776229695, "lng" => 20.855977063986415],
            ["lat" => 52.497739068419776, "lng" => 20.319068695152424],
            ["lat" => 52.147285464629306, "lng" => 20.63063092773467],
        ];


        $clubs = [
            [
                'name' => "Polonia Warszawa",
                'url_logo' => "https://i.imgur.com/L9znd4v.png",
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

        DB::table('poloniawarszawa')->insert($clubs);
    }
}
