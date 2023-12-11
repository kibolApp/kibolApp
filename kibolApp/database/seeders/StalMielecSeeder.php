<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StalMielecSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Czarni Jasło", "Sandecja Nowy Sącz"];
        $negativeClubs = [
            "Siarka Tarnobrzeg", "Stal Stalowa Wola", "Wisłoka Dębica", "Igloopol Dębica", "Resovia Rzeszów", 
            "Stal Rzeszów", "Karpaty Krosno", "JKS Jarosław", "Stal Sanok", "Polonia Przemyśl", 
            "Wisła Kraków", "Unia Tarnów", "Zagłębie Sosnowiec", "Górnik Zabrze", "GKS Katowice", 
            "GKS Jastrzębie", "ROW Rybnik", "Miedź Legnica", "Radomiak Radom", "Legia Warszawa", 
            "Motor Lublin", "Górnik Łęczna", "Chełmianka Chełm", "Łada Biłgoraj", "Wisła Sandomierz", 
            "Raków Częstochowa"
        ];

        $clubs = [
            [
                'name' => "Stal Mielec",
                'url_logo' => "https://i.imgur.com/Vhi20Rx.png",
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

        DB::table('stalmielec')->insert($clubs);
    }
}
