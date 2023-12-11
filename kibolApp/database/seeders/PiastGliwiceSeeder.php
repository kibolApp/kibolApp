<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PiastGliwiceSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = [
            "GKS Jastrzębie"
        ];

        $negativeClubs = [
            "Górnik Zabrze", "GKS Katowice", "Zagłębie Sosnowiec", "ROW Rybnik", "Odra Wodzisław Śl.", 
            "Polonia Bytom", "Cracovia", "Legia Warszawa", "Odra Opole", "Śląsk Wrocław", "ŁKS Łódź", 
            "Lech Poznań", "Arka Gdynia", "Pogoń Szczecin", "Sandecja Nowy Sącz", "Wisłoka Dębica"
        ];

        $clubs = [
            [
                'name' => "Piast Gliwice",
                'url_logo' => "https://i.imgur.com/yZJMMP8.png",
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

        DB::table('piastgliwice')->insert($clubs);
    }
}
