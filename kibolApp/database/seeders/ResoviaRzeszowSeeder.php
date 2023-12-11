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

        $clubs = [
            [
                'name' => "Resovia Rzeszów",
                'url_logo' => "https://i.imgur.com/dfoyZ4A.png",
                'positive' => null,
                'negative' => null,
            ],
        ];

        foreach ($positiveClubs as $club) {
            $clubs[] = ['name' => null, 'url_logo' => null, 'positive' => $club, 'negative' => null];
        }

        foreach ($negativeClubs as $club) {
            $clubs[] = ['name' => null, 'url_logo' => null, 'positive' => null, 'negative' => $club];
        }

        DB::table('resoviarzeszow')->insert($clubs);
    }
}