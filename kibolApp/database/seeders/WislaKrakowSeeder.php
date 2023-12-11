<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WislaKrakowSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Ruch Chorzów"];

        $negativeClubs = [
            "Cracovia", "Lech Poznań", "Arka Gdynia", "GKS Tychy", "Sandecja Nowy Sącz", "Tarnovia Tarnów",
            "Hutnik Kraków", "Górnik Zabrze", "GKS Katowice", "Legia Warszawa", "Zagłębie Sosnowiec",
            "Radomiak Radom", "ŁKS Łódź", "Korona Kielce", "Motor Lublin", "Śląsk Wrocław", "Lechia Gdańsk",
            "Zawisza Bydgoszcz", "Włocłavia Włocławek", "Olimpia Elbląg", "Jagiellonia Białystok", "Pogoń Szczecin",
            "Polonia Warszawa", "Wisła Płock", "Zagłębie Lubin", "Miedź Legnica", "Chrobry Głogów",
            "Polonia Bytom", "ROW Rybnik", "Raków Częstochowa", "BKS Stal Bielsko-Biała", "Góral Żywiec",
            "Czuwaj Przemyśl", "JKS Jarosław", "Wisłoka Dębica", "Resovia Rzeszów", "Stal Mielec",
            "Siarka Tarnobrzeg", "Czarni Jasło", "Górnik Łęczna", "Chełmianka Chełm", "Hetman Zamość",
            "KSZO Ostrowiec Św.", "Naprzód Jędrzejów", "GKS Bełchatów", "Beskid Andrychów", "Podbeskidzie Bielsko-Biała",
            "Odra Opole", "Apator Toruń", "Chojniczanka Chojnice", "Gwardia Koszalin"
        ];

        $clubs = [
            [
                'name' => "Wisła Kraków",
                'url_logo' => "https://i.imgur.com/LgnZzdC.png",
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

        DB::table('wislakrakow')->insert($clubs);
    }
}