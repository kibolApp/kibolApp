<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZaglebieLubinSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Arka Gdynia", "Odra Opole", "Zawisza Bydgoszcz"];

        $negativeClubs = [
            "Śląsk Wrocław", "Chrobry Głogów", "Miedź Legnica", "Wisła Kraków", "Ruch Chorzów",
            "Widzew Łódź", "Elana Toruń", "Legia Warszawa", "Zagłębie Sosnowiec", "Raków Częstochowa",
            "BKS Stal Bielsko-Biała", "Chemik Kędzierzyn-Koźle", "Start Namysłów", "Stal Gorzów Wlkp.",
            "Stilon Gorzów Wlkp.", "Flota Świnoujście", "Lechia Gdańsk", "Stal Brzeg", "Moto-Jelcz Oława",
            "Piast Nowa Ruda", "Karkonosze Jelenia Góra", "Bielewianka Bielawa", "Lechia Dzierżoniów",
            "Zagłębie Wałbrzych", "Czuwaj Przemyśl"
        ];
        $coordinates = [
            ["lat" => 51.651744306829755, "lng" => 16.679716814236997],
            ["lat" => 51.58960177772357, "lng" => 16.674724467459384],
            ["lat" => 51.59056221336104, "lng" => 16.186710699379802],
            ["lat" => 51.40351515974561, "lng" => 14.968054320747001],
            ["lat" => 51.375102464800165, "lng" => 14.977113783784517],
            ["lat" => 51.35545498765339, "lng" => 14.970373548228707],
            ["lat" => 51.3183940064784, "lng" => 14.996918845114521],
            ["lat" => 51.29009810747823, "lng" => 15.037215345511584],
            ["lat" => 51.216276699324965, "lng" => 15.017115275717401],
            ["lat" => 51.1600033448542, "lng" => 15.005581306616222],
            ["lat" => 51.292326652119925, "lng" => 15.624082432414014],
            ["lat" => 51.31627846489556, "lng" => 16.024511102351994],
            ["lat" => 51.377474085942026, "lng" => 16.48605361483763],
            ["lat" => 51.465836311288, "lng" => 16.97627787187082],
            ["lat" => 51.5691890813367, "lng" => 16.81844135033066],
            ["lat" => 51.64317006944353, "lng" => 16.785960278684627],
            ["lat" => 51.651744306829755, "lng" => 16.679716814236997],
        ];


        $clubs = [
            [
                'name' => "Zagłębie Lubin",
                'url_logo' => "https://i.imgur.com/ASAxV9N.png",
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

        DB::table('zaglebielubin')->insert($clubs);
    }
}
