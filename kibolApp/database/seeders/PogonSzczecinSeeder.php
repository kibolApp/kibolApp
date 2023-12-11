<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PogonSzczecinSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = [
            "Kotwica Kołobrzeg"
        ];

        $negativeClubs = [
            "Cracovia", "Lech Poznań", "Arka Gdynia", "Lechia Gdańsk", "Zagłębie Sosnowiec", 
            "Gwardia Koszalin", "Flota Świnoujście", "Gryf Słupsk", "Bałtyk Gdynia", "Stilon Gorzów Wlkp.", 
            "Falubaz Zielona Góra", "Zawisza Bydgoszcz", "Elana Toruń", "Olimpia Grudziądz", "Stomil Olsztyn", 
            "Olimpia Elbląg", "Jagiellonia Białystok", "Polonia Warszawa", "Wisła Kraków", "Unia Tarnów", 
            "Sandecja Nowy Sącz", "Beskid Andrychów", "BKS Stal Bielsko-Biała", "GKS Tychy", "Górnik Zabrze", 
            "Polonia Bytom", "Piast Gliwice", "Raków Częstochowa", "Śląsk Wrocław", "Miedź Legnica", 
            "Chrobry Głogów", "Odra Opole", "ŁKS Łódź", "Wisła Płock", "Avia Świdnik", "Motor Lublin", 
            "Górnik Łęczna", "Chełmianka Chełm", "Resovia Rzeszów", "Stal Mielec", "Ilanka Rzepin"
        ];

        $clubs = [
            [
                'name' => "Pogoń Szczecin",
                'url_logo' => "https://i.imgur.com/VWC7J2A.png",
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

        DB::table('pogonszczecin')->insert($clubs);
    }
}
