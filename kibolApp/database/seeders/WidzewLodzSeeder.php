<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WidzewLodzSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Kibice Widzewa"];

        $negativeClubs = ["Cała Polska"];
        $coordinates = [
            ["lat" => 51.331071163042395, "lng" => 18.093818213930604],
            ["lat" => 51.33962748969296, "lng" => 20.131118890552955],
            ["lat" => 52.10438793160421, "lng" => 20.41780363812262],
            ["lat" => 52.24346151087008, "lng" => 19.20596919873671],
            ["lat" => 52.205273320543654, "lng" => 18.592879596316095],
            ["lat" => 51.331071163042395, "lng" => 18.093818213930604],
        ];

        $clubs = [
            [
                'name' => "Widzew Łódź",
                'url_logo' => "https://i.imgur.com/Gy7xBj9.png",
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
        DB::table('widzewlodz')->insert($clubs);
    }
}
