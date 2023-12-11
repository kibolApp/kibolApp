<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LechPoznanSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = [
            "Arka Gdynia", "Cracovia", "KSZO Ostrowiec Św.", "ŁKS Łódź"
        ];

        $negativeClubs = [
            "Wisła Kraków", "Ruch Chorzów", "Widzew Łódź", "Elana Toruń", "Legia Warszawa",
            "Olimpia Elbląg", "Zagłębie Sosnowiec", "Radomiak Radom", "Korona Kielce",
            "Lechia Gdańsk", "Śląsk Wrocław", "Pogoń Szczecin", "KKS Kalisz", "Unia Leszno",
            "Miedź Legnica", "BKS Stal Bielsko-Biała", "Piast Gliwice", "Raków Częstochowa",
            "Stal Rzeszów", "Karpaty Krosno", "Stal Stalowa Wola", "Polonia Przemyśl",
            "Resovia Rzeszów", "Czuwaj Przemyśl", "Polonia Warszawa", "Stomil Olsztyn",
            "Jagiellonia Białystok", "Stilon Gorzów Wlkp.", "Polonia Bydgoszcz", "Kotwica Kołobrzeg"
        ];

        $clubs = [
            [
                'name' => "Lech Poznań",
                'url_logo' => "https://i.imgur.com/dGaDZz8.png",
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

        DB::table('lechpoznan')->insert($clubs);
    }
}
