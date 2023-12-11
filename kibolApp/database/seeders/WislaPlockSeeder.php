<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WislaPlockSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Stomil Olsztyn"];

        $negativeClubs = [
            "Legia Warszawa", "Radomiak Radom", "Olimpia Elbląg", "Zagłębie Sosnowiec", "Górnik Zabrze",
            "Polonia Warszawa", "Zawisza Bydgoszcz", "Elana Toruń", "Arka Gdynia", "Pogoń Szczecin",
            "Gwardia Koszalin", "Zagłębie Lubin", "ŁKS Łódź", "Widzew Łódź", "Motor Lublin", "Górnik Łęczna",
            "Avia Świdnik", "Stal Stalowa Wola", "Wisła Kraków", "Sandecja Nowy Sącz", "Korona Kielce",
            "Hutnik Warszawa", "Ursus Warszawa", "Olimpia Warszawa", "Warszawianka Warszawa", "Dolcan Ząbki",
            "Świt Nowy Dwór Mazowiecki", "Legionovia Legionowo", "Znicz Pruszków", "Pogoń Siedlce"
        ];

        $clubs = [
            [
                'name' => "Wisła Płock",
                'url_logo' => "https://i.imgur.com/AkAwgeA.png",
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

        DB::table('wislaplock')->insert($clubs);
    }
}