<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WartaPoznanSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Błekitni Stargard", "Lechia Zielona Góra"];
        $negativeClubs = [
            "KKS Kalisz", "Unia Leszno", "Pogoń Szczecin", "Dyskobolia Grodzisk Wielkopolski", 
            "Wisła Kraków", "Ruch Chorzów", "Widzew Łódź", "Elana Toruń", "Kotwica Kołobrzeg", 
            "Radomiak Radom", "Lechia Gdańsk", "Śląsk Wrocław", "Piast Gliwice"
        ];

        $clubs = [
            [
                'name' => "Warta Poznań",
                'url_logo' => "https://i.imgur.com/pHbkZBs.png",
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

        DB::table('wartapoznan')->insert($clubs);
    }
}
