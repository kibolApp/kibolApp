<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PodbeskidzieBielskoBialaSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = [];

        $negativeClubs = [
            "BKS Stal Bielsko-Biała", "Miedź Legnica", "Zagłębie Sosnowiec", "Szczakowianka Jaworzno", 
            "Wisła Kraków", "Legia Warszawa", "Odra Opole", "Śląsk Wrocław", "Lechia Gdańsk", 
            "MRKS Walcownia Czechowice-Dziedzice", "Hejnał Kęty"
        ];

        $clubs = [
            [
                'name' => "Podbeskidzie Bielsko-Biała",
                'url_logo' => "https://i.imgur.com/07rCZxP.png",
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

        DB::table('podbeskidziebielskobiala')->insert($clubs);
    }
}
