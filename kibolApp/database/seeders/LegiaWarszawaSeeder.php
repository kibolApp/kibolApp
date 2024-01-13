<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegiaWarszawaSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = [
            "Zagłębie Sosnowiec",
            "Olimpia Elbląg",
            "Radomiak Radom"
        ];

        $negativeClubs = [
            "Lech Poznań", "Cracovia", "Widzew Łódź", "Ruch Chorzów", "Wisła Kraków", "Elana Toruń",
            "Lechia Gdańsk", "Śląsk Wrocław", "Polonia Warszawa", "Stomil Olsztyn", "Jagiellonia Białystok",
            "Zawisza Bydgoszcz", "Motor Lublin", "Wisła Płock", "ŁKS Łódź", "Korona Kielce", "Górnik Zabrze",
            "GKS Katowice", "Polonia Bytom", "GKS Tychy", "Piast Gliwice", "GKS Jastrzębie",
            "BKS Stal Bielsko-Biała", "Raków Częstochowa", "Zagłębie Lubin", "Miedź Legnica", "Hutnik Kraków",
            "Unia Tarnów", "Tarnovia Tarnów", "Sandecja Nowy Sącz", "KSZO Ostrowiec Św.", "Broń Radom",
            "Powiślanka Lipsko", "Gwardia Warszawa", "Górnik Łęczna", "Hetman Zamość", "Chełmianka Chełm",
            "Avia Świdnik", "Stal Mielec", "Resovia Rzeszów", "Polonia Przemyśl", "Stal Stalowa Wola",
            "Karpaty Krosno", "Stal Rzeszów", "Warta Poznań", "KKS Kalisz"
        ];
        $coordinates = [
            ["lat" => 52.4015433357697, "lng" => 20.052819704984813],
            ["lat" => 51.84703922590137, "lng" => 20.090183596568664],
            ["lat" => 52.10298563374914, "lng" => 22.159155575454577],
            ["lat" => 52.418802715881554, "lng" => 22.56308737197955],
            ["lat" => 52.65401727471536, "lng" => 22.438921816785182],
            ["lat" => 53.128092369973984, "lng" => 21.730151527073076],
            ["lat" => 52.4015433357697, "lng" => 20.052819704984813],
        ];


        $clubs = [
            [
                'name' => "Legia Warszawa",
                'url_logo' => "https://i.imgur.com/484NrE2.png",
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

        DB::table('legiawarszawa')->insert($clubs);
    }
}
