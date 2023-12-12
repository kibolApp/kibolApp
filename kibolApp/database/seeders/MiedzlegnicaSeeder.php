<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiedzLegnicaSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["WKS Śląsk Wrocław", "Lechia Gdańsk", "Płomień Żary"];
        $negativeClubs = [
            'BKS Stal Bielsko-Biała', 'Arka Gdynia', 'BKS Bolesławiec', 'Chrobry Głogów', 'Cracovia Kraków',
            'GKS Katowice', 'GKS Tychy', 'Górnik Polkowice', 'Górnik Wałbrzych', 'Górnik Zabrze', 'Lech Poznań',
            'Legia Warszawa', 'Motor Lublin', 'Odra Opole', 'Podbeskidzie Bielsko-Biała', 'Polonia Świdnica',
            'Pogoń Szczecin', 'Radomiak Radom', 'Ruch Chorzów', 'Sandecja Nowy Sącz', 'Stal Rzeszów',
            'Stal Stalowa Wola', 'Widzew Łódź', 'Wisła Kraków', 'Zawisza Bydgoszcz', 'Zagłębie Lubin'
        ];

        $clubs = [
            
            [
                'name' => "MKS Miedź Legnica",
                'url_logo' => "https://i.imgur.com/AJ27Q2w.png",
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
        
        DB::table('miedzlegnica')->insert($clubs);
    }
}
