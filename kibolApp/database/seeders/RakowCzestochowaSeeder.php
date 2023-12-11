<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RakowCzestochowaSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Chemik Kędzierzyn-Koźle"];
        $negativeClubs = [
            "Ruch Chorzów", "KS Myszków", "Widzew Łódź", "Polonia Bytom", "Piast Gliwice", 
            "BKS Stal Bielsko-Biała", "Odra Opole", "Zagłębie Lubin", "Resovia Rzeszów", 
            "Stal Mielec", "Wisła Kraków", "Elana Toruń", "Arka Gdynia", "Lech Poznań", 
            "Cracovia", "Sandecja Nowy Sącz", "Zagłębie Sosnowiec", "Korona Kielce", 
            "Polonia Warszawa", "Legia Warszawa", "Radomiak Radom", "Olimpia Elbląg", 
            "Jagiellonia Białystok", "Pogoń Szczecin", "Kotwica Kołobrzeg", "Włókniarz Częstochowa", 
            "AZS Częstochowa"
        ];

        $clubs = [
            [
                'name' => "Raków Częstochowa",
                'url_logo' => "https://i.imgur.com/KTybnDT.png",
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

        DB::table('rakowczestochowa')->insert($clubs);
    }
}
