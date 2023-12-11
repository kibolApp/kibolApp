<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoloniaWarszawaSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = [];

        $negativeClubs = [
            "Legia Warszawa", "Zagłębie Sosnowiec", "Olimpia Elbląg", "Radomiak Radom", "Hutnik Warszawa", 
            "Olimpia Warszawa", "Ursus Warszawa", "Dolcan Ząbki", "Znicz Pruszków", "Świt Nowy Dwór Mazowiecki", 
            "Legionovia Legionowo", "Pogoń Siedlce", "Wisła Płock", "Legia Chełmża", "Pogoń Szczecin", 
            "Bałtyk Gdynia", "Jagiellonia Białystok", "Motor Lublin", "Hetman Zamość", "Wisła Puławy", 
            "KSZO Ostrowiec Św.", "Unia Tarnów", "Ruch Chorzów", "GKS Katowice", "BKS Stal Bielsko-Biała", 
            "Raków Częstochowa", "Gwardia Koszalin"
        ];

        $clubs = [
            [
                'name' => "Polonia Warszawa",
                'url_logo' => "https://i.imgur.com/L9znd4v.png",
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

        DB::table('poloniawarszawa')->insert($clubs);
    }
}
