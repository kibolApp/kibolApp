<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArkaGdyniaSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = [
            "Cracovia", "Lech Poznań", "Polonia Bytom", "Zagłębie Lubin", "KSZO Ostrowiec Św.", "Gwardia Koszalin"
        ];

        $negativeClubs = [
            "Lechia Gdańsk", "Śląsk Wrocław", "Motor Lublin", "Wisła Kraków", "Ruch Chorzów", "Widzew Łódź", 
            "Elana Toruń", "Legia Warszawa", "Stomil Olsztyn", "Pogoń Szczecin", "Bałtyk Gdynia", "Jagiellonia Białystok", 
            "Olimpia Elbląg", "Radomiak Radom", "Wisła Płock", "Korona Kielce", "Unia Tarnów", "Zagłębie Sosnowiec", 
            "Górnik Zabrze", "GKS Katowice", "Piast Gliwice", "ROW Rybnik", "Raków Częstochowa", "Miedź Legnica", 
            "Górnik Łęczna", "Hetman Zamość", "KKS Kalisz", "Jeziorak Iława", "Kotwica Kołobrzeg", "Gryf Słupsk", 
            "Czarni Słupsk", "Chojniczanka Chojnice", "Bytovia Bytów", "KP Starogard Gdański", "Stal Stalowa Wola"
        ];

        $clubs = [
            [
                'name' => "Arka Gdynia",
                'url_logo' => "https://i.imgur.com/DIxQvf1.png",
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

        DB::table('arkagdynia')->insert($clubs);
    }
}
