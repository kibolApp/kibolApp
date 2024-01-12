<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GornikZabrzeSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["GKS Katowice", "Wisłoka Dębica", "ROW Rybnik"];
        $negativeClubs = ["Ruch Chorzów", "Wisła Kraków", "Widzew Łódź", "Elana Toruń", "Legia Warszawa", 
                          "Zagłębie Sosnowiec", "Polonia Bytom", "GKS Tychy", "Piast Gliwice", "GKS Jastrzębie", 
                          "Odra Wodzisław Śl.", "Raków Częstochowa", "BKS Stal Bielsko-Biała", "Odra Opole", 
                          "Chemik Kędzierzyn-Koźle", "Śląsk Wrocław", "Lechia Gdańsk", "Stomil Olsztyn", 
                          "Wisła Płock", "Olimpia Elbląg", "Arka Gdynia", "Radomiak Radom", "Miedź Legnica", 
                          "Górnik Wałbrzych", "Chrobry Głogów", "KS Myszków", "Ruch Radzionków", "Igloopol Dębica", 
                          "Stal Rzeszów", "Karpaty Krosno", "Stal Mielec", "Sandecja Nowy Sącz", "Hutnik Kraków", 
                          "GKS Bełchatów", "KKS Kalisz", "Pogoń Szczecin"];
        $coordinates = [
                            ["lat" => 50.389872839863074, "lng" => 18.83017379398862],
                            ["lat" => 50.37588482825214, "lng" => 18.780315285067957],
                            ["lat" => 50.37040655825095, "lng" => 18.734392375575908],
                            ["lat" => 50.355572821293435, "lng" => 18.720691378472736],
                            ["lat" => 50.30222011986015, "lng" => 18.72645449692783],
                            ["lat" => 50.286263573932274, "lng" => 18.714659061094153],
                            ["lat" => 50.294502382852954, "lng" => 18.836357108121405],
                            ["lat" => 50.389872839863074, "lng" => 18.83017379398862]
                        ];

        $clubs = [
            [
                'name' => "Górnik Zabrze",
                'url_logo' => "https://i.imgur.com/G01NIvs.png",
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
        DB::table('gornikzabrze')->insert($clubs);
    }
}
