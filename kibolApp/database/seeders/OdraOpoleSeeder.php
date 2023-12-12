<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OdraOpoleSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Polonia Bytom", "Zagłębie Lubin"];
        $negativeClubs = [
            "Chemik Kędzierzyn-Koźle", "Śląsk Wrocław", "Górnik Zabrze", "GKS Katowice", "Zagłębie Sosnowiec", 
            "Piast Gliwice", "Raków Częstochowa", "GKS Jastrzębie", "BKS Stal Bielsko-Biała", "Podbeskidzie Bielsko-Biała", 
            "Miedź Legnica", "Chrobry Głogów", "Start Namysłów", "Stal Brzeg", "Włókniarz Kietrz", "Motor Lublin", 
            "ŁKS Łódź", "Widzew Łódź", "Wisła Kraków", "Elana Toruń"
        ];

        $clubs = [
            [
                'name' => "Odra Opole",
                'url_logo' => "https://i.imgur.com/8j6dBw6.png",
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

        DB::table('odraopole')->insert($clubs);
    }
}
