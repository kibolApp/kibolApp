<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GKSKatowiceSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Górnik Zabrze"];
        $negativeClubs = [
            "Ruch Chorzów", "Wisła Kraków", "Widzew Łódź", "Elana Toruń", "Zagłębie Sosnowiec",
            "Legia Warszawa", "GKS Tychy", "Polonia Bytom", "Piast Gliwice", "BKS Stal Bielsko-Biała",
            "GKS Jastrzębie", "Odra Wodzisław Śl.", "Odra Opole", "Górnik Wałbrzych", "ŁKS Łódź",
            "GKS Bełchatów", "Radomiak Radom", "Olimpia Elbląg", "Arka Gdynia", "Lechia Gdańsk",
            "KKS Kalisz", "Hutnik Kraków", "Sandecja Nowy Sącz", "Beskid Andrychów", "Stal Rzeszów",
            "Karpaty Krosno", "Stal Stalowa Wola", "Igloopol Dębica", "Czuwaj Przemyśl"
        ];
        $coordinates = [
            ["lat" => 50.49516782332944, "lng" => 18.957171285334738],
            ["lat" => 50.29772729157466, "lng" => 18.970704842840263],
            ["lat" => 50.28644661280825, "lng" => 18.967195841851463],
            ["lat" => 50.197923552372544, "lng" => 18.981893466282486],
            ["lat" => 50.1924703913424, "lng" => 19.139506313572383],
            ["lat" => 50.28064593596247, "lng" => 19.10169607978264],
            ["lat" => 50.500935048533734, "lng" => 19.295292420936647],
            ["lat" => 50.49516782332944, "lng" => 18.957171285334738]
        ];

        $clubs = [
            [
                'name' => "GKS Katowice",
                'url_logo' => asset('gkskatowice.png'),
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

        DB::table('gkskatowice')->insert($clubs);
    }
}
