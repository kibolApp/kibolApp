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

        $clubs = [
            [
                'name' => "GKS Tychy",
                'url_logo' => "https://i.imgur.com/oyiIhGG.png",
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

        DB::table('gkstychy')->insert($clubs);
    }
}
