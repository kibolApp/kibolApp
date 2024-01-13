<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResoviaRzeszowSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Kibice Resovii Rzeszów"];

        $negativeClubs = [
            "Stal Rzeszów", "Karpaty Krosno", "Stal Stalowa Wola", "Polonia Przemyśl", "Iglopol Dębica",
            "Orzeł Przeworsk", "Sokół Nisko", "Stal Mielec", "Cracovia", "Widzew Łódź", "Ruch Chorzów",
            "Wisła Kraków", "Elana Toruń", "Hutnik Kraków", "Sandecja Nowy Sącz", "Tarnovia Tarnów",
            "Raków Częstochowa", "GKS Tychy", "GKS Jastrzębie", "ŁKS Łódź", "Łada Biłgoraj", "Radomiak Radom"
        ];
        $coordinates = [
            ["lat" => 50.02434139961545, "lng" => 21.701358507315064],
            ["lat" => 50.03589253262615, "lng" => 22.049585559836856],
            ["lat" => 50.107157251504674, "lng" => 23.30595453007095],
            ["lat" => 50.250490525692584, "lng" => 23.546097791755642],
            ["lat" => 50.397133626100185, "lng" => 23.567280532618412],
            ["lat" => 50.494583010950095, "lng" => 22.550027940953527],
            ["lat" => 50.58868835094978, "lng" => 22.514798797534297],
            ["lat" => 50.66874299665548, "lng" => 22.148124353525333],
            ["lat" => 50.754290510268135, "lng" => 22.198375001362223],
            ["lat" => 50.797124649210275, "lng" => 22.15658991878246],
            ["lat" => 50.81498409287241, "lng" => 22.050512802399396],
            ["lat" => 50.80605349695833, "lng" => 21.874667700598394],
            ["lat" => 50.65272075622383, "lng" => 21.780871332471065],
            ["lat" => 50.521196716789376, "lng" => 21.512722407302135],
            ["lat" => 50.012950802676215, "lng" => 21.52480383690485],
            ["lat" => 50.02434139961545, "lng" => 21.701358507315064],
        ];


        $clubs = [
            [
                'name' => "Resovia Rzeszów",
                'url_logo' => "https://i.imgur.com/dfoyZ4A.png",
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

        DB::table('resoviarzeszow')->insert($clubs);
    }
}
