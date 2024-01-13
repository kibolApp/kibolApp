<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CracoviaKrakowSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Arka Gdynia", "Lech Poznań", "GKS Tychy", "Sandecja Nowy Sącz", "Tarnovia Tarnów"];
        $negativeClubs = ["Wisła Kraków", "Ruch Chorzów", "Widzew Łódź", "Elana Toruń", "Unia Tarnów",
                          "Legia Warszawa", "Zagłębie Sosnowiec", "Śląsk Wrocław", "Lechia Gdańsk",
                          "Pogoń Szczecin", "Jagiellonia Białystok", "Radomiak Radom", "Motor Lublin",
                          "Polonia Przemyśl", "Resovia Rzeszów", "Okocimski Brzesko", "Unia Oświęcim",
                          "Hejnał Kęty", "Glinik Gorlice", "Podhale Nowy Targ", "Karpaty Krosno",
                          "Wisłoka Dębica", "Piast Gliwice", "Raków Częstochowa", "Miedź Legnica",
                          "KKS Kalisz", "Hetman Zamość", "Stomil Olsztyn"];

        $clubs = [
            [
                'name' => "Cracovia Kraków",
                'url_logo' => "https://i.imgur.com/B82c3Ze.png",
                'positive' => null,
                'negative' => null,
                'lat'=>null,
                'lng'=>null,
            ],
        ];
        $coordinates = [
            ["lat" => 50.48163808807752, "lng" => 20.24467630990614],
            ["lat" => 49.77305212684172, "lng" => 19.425062872580753],
            ["lat" => 49.58919029995377, "lng" => 19.462329305682772],
            ["lat" => 49.43659256320839, "lng" => 19.591164679660636],
            ["lat" => 49.38678491168906, "lng" => 19.71581736880742],
            ["lat" => 49.4179135214942, "lng" => 19.788359323054607],
            ["lat" => 49.29653416750054, "lng" => 19.820596200468543],
            ["lat" => 49.50198023682316, "lng" => 20.333859068203992],
            ["lat" => 50.20672676990105, "lng" => 20.410037728814643],
            ["lat" => 50.48163808807752, "lng" => 20.24467630990614]
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

        DB::table('cracoviakrakow')->insert($clubs);
    }
}
