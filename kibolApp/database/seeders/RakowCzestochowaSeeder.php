<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RakowCzestochowaSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Chemik Kędzierzyn-Koźle"];
        $negativeClubs = [
            "Ruch Chorzów", "KS Myszków", "Widzew Łódź", "Polonia Bytom", "Piast Gliwice", 
            "BKS Stal Bielsko-Biała", "Odra Opole", "Zagłębie Lubin", "Resovia Rzeszów", 
            "Stal Mielec", "Wisła Kraków", "Elana Toruń", "Arka Gdynia", "Lech Poznań", 
            "Cracovia", "Sandecja Nowy Sącz", "Zagłębie Sosnowiec", "Korona Kielce", 
            "Polonia Warszawa", "Legia Warszawa", "Radomiak Radom", "Olimpia Elbląg", 
            "Jagiellonia Białystok", "Pogoń Szczecin", "Kotwica Kołobrzeg", "Włókniarz Częstochowa", 
            "AZS Częstochowa"
        ];
        $coordinates = [
            ["lat" => 51.16351170201787, "lng" => 17.975771222858867],
            ["lat" => 50.48043257732098, "lng" => 18.07859972252453],
            ["lat" => 50.504301929566225, "lng" => 19.50481622551996],
            ["lat" => 50.5918478856554, "lng" => 19.87119339581929],
            ["lat" => 51.33587091549464, "lng" => 20.092462540493557],
            ["lat" => 51.326521506129836, "lng" => 18.21146917901271],
            ["lat" => 51.16351170201787, "lng" => 17.975771222858867],
        ];
        

        $clubs = [
            [
                'name' => "Raków Częstochowa",
                'url_logo' => "https://i.imgur.com/KTybnDT.png",
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
        DB::table('rakowczestochowa')->insert($clubs);
    }
}
