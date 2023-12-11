<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JagielloniaBialystokSeeder extends Seeder
{
    public function run()
    {
        
        $positiveClubs = ["Mazur Ełk"];
        $negativeClubs = ["Legia Warszawa", "Cracovia", "ŁKS Łomża", "Wigry Suwałki", "Stomil Olsztyn", 
                        "Olimpia Elbląg", "Arka Gdynia", "Pogoń Szczecin", "Zawisza Bydgoszcz", "Lech Poznań",
                        "Radomiak Radom", "Śląsk Wrocław", "Korona Kielce", "Wisła Kraków", "Zagłębie Sosnowiec",
                        "Górnik Zabrze", "Stal Stalowa Wola", "Resovia Rzeszów", "Polonia Warszawa", "Granica Kętrzyn",
                        "Sparta Szepietowo", "Hetman Białystok"];

        $clubs = [
            [
                'name' => "Jagiellonia Białystok",
                'url_logo' => "https://i.imgur.com/HpUwEAe.png",
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

        DB::table('jagielloniabialystok')->insert($clubs);
    }
}
