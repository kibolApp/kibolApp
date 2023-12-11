<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LKSLodzSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = [
            "Zawisza Bydgoszcz", "GKS Tychy", "Lech Poznań"
        ];

        $negativeClubs = [
            "Widzew Łódź", "Ruch Chorzów", "Wisła Kraków", "Elana Toruń", "KKS Kalisz", "Stal Rzeszów", 
            "Karpaty Krosno", "Stal Stalowa Wola", "Resovia Rzeszów", "Legia Warszawa", "Zagłębie Sosnowiec", 
            "BKS Stal Bielsko-Biała", "Olimpia Elbląg", "Radomiak Radom", "Odra Opole", "Chrobry Głogów", 
            "Śląsk Wrocław", "Motor Lublin", "Chełmianka Chełm", "Wisła Płock", "Polonia Warszawa", 
            "Stomil Olsztyn", "Jagiellonia Białystok", "Pogoń Szczecin", "Polonia Bydgoszcz", "RKS Radomsko", 
            "Ceramika Opoczno", "GKS Katowice", "KS Myszków", "Piast Gliwice"
        ];

        $clubs = [
            [
                'name' => "ŁKS Łódź",
                'url_logo' => "https://imgur.com/BJPSl4y.png",
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

        DB::table('lkslodz')->insert($clubs);
    }
}
