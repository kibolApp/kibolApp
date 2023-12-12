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

        $clubs = [
            [
                'name' => "GKS Katowice",
                'url_logo' => "https://i.imgur.com/LaB5Fat.png",
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

        DB::table('gkskatowice')->insert($clubs);
    }
}
