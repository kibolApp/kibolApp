<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StalRzeszowSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Karpaty Krosno"];

        $negativeClubs = [
            "Resovia Rzeszów", "Stal Sanok", "JKS Jarosław", "Czuwaj Przemyśl", "Siarka Tarnobrzeg",
            "Stal Mielec", "Wisłoka Dębica", "Czarni Jasło", "Unia Nowa Sarzyna", "Unia Tarnów",
            "Tarnovia Tarnów", "Sandecja Nowy Sącz", "GKS Tychy", "Górnik Zabrze", "GKS Katowice",
            "Śląsk Wrocław", "Miedź Legnica", "Motor Lublin", "Górnik Łęczna", "Hetman Zamość",
            "Chełmianka Chełm", "ŁKS Łódź", "Wisła Sandomierz", "Zawisza Bydgoszcz", "Apator Toruń"
        ];

        $clubs = [
            [
                'name' => "Stal Rzeszów",
                'url_logo' => "https://i.imgur.com/Mt0ygDr.png",
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

        DB::table('stalrzeszow')->insert($clubs);
    }
}