<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GKSTychySeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Cracovia", "Sandecja Nowy Sącz", "ŁKS Łódź", "Zawisza Bydgoszcz", "Górnik Wałbrzych"];
        $negativeClubs = [
            "BKS Stal Bielsko-Biała", "GKS Jastrzębie", "ROW Rybnik", "GKS Katowice", "Górnik Zabrze", 
            "Ruch Chorzów", "Zagłębie Sosnowiec", "Legia Warszawa", "Wisła Kraków", "Widzew Łódź", 
            "Elana Toruń", "Radomiak Radom", "Motor Lublin", "Olimpia Elbląg", "Stomil Olsztyn", 
            "Pogoń Szczecin", "Lechia Gdańsk", "Śląsk Wrocław", "Miedź Legnica", "KS Myszków", 
            "Unia Oświęcim", "Unia Tarnów", "Resovia Rzeszów", "Stal Rzeszów"
        ];
        $coordinates = [
            ["lat" => 50.20555266567456, "lng" => 18.719872020769515],
            ["lat" => 49.911116886191564, "lng" => 18.656720925607374],
            ["lat" => 49.866483427749785, "lng" => 19.113655396495915],
            ["lat" => 50.19267610398333, "lng" => 19.14024123929667],
            ["lat" => 50.20555266567456, "lng" => 18.719872020769515]
        ];

        $clubs = [
            [
                'name' => "GKS Tychy",
                'url_logo' => "https://i.imgur.com/oyiIhGG.png",
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
        DB::table('gkstychy')->insert($clubs);
    }
}
