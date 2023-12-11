<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GornikLecznaSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Chełmianka Chełm"];
        $negativeClubs = [
            "Avia Świdnik", "Stal Stalowa Wola", "Łada Biłgoraj", "Tomasovia Tomaszów Lubelski", 
            "Orlęta Radzyń Podlaski", "Orlęta Łuków", "Wisła Puławy", "Stal Rzeszów", "Karpaty Krosno", 
            "Polonia Przemyśl", "Siarka Tarnobrzeg", "Stal Mielec", "Sokół Nisko", "Wisła Kraków", 
            "Widzew Łódź", "Ruch Chorzów", "Elana Toruń", "GKS Jastrzębie", "Chemik Kędzierzyn-Koźle", 
            "Korona Kielce", "Legia Warszawa", "Radomiak Radom", "Olimpia Elbląg", "Wisła Płock", 
            "Pogoń Szczecin", "Arka Gdynia", "Lech Poznań"
        ];

        $clubs = [
            [
                'name' => "Górnik Łęczna",
                'url_logo' => "https://i.imgur.com/ViNJIKR.png",
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

        DB::table('gornikleczna')->insert($clubs);
    }
}
