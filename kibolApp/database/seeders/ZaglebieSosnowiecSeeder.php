<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZaglebieSosnowiecSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Legia Warszawa", "Olimpia Elbląg", "BKS Stal Bielsko-Biała", "Czuwaj Przemyśl"];

        $negativeClubs = [
            "GKS Katowice", "Górnik Zabrze", "Ruch Chorzów", "Polonia Bytom", "GKS Tychy", "Piast Gliwice",
            "ROW Rybnik", "GKS Jastrzębie", "Góral Żywiec", "Raków Częstochowa", "Wisła Kraków", "Cracovia",
            "Lech Poznań", "Arka Gdynia", "Pogoń Szczecin", "Stomil Olsztyn", "Jagiellonia Białystok",
            "Elana Toruń", "Zawisza Bydgoszcz", "Widzew Łódź", "ŁKS Łódź", "Korona Kielce", "Polonia Warszawa",
            "Wisła Płock", "Broń Radom", "Zagłębie Lubin", "Odra Opole", "Polonia Przemyśl", "Stal Stalowa Wola",
            "Stal Mielec", "Igloopol Dębica", "JKS Jarosław", "Sandecja Nowy Sącz", "Unia Tarnów", "Unia Oświęcim",
            "Hejnał Kęty", "Szombierki Bytom", "Ruch Radzionków", "Szczakowianka Jaworzno", "KS Myszków",
            "Odra Wodzisław Śl.", "Podbeskidzie Bielsko-Biała"
        ];

        $clubs = [
            [
                'name' => "Zagłębie Sosnowiec",
                'url_logo' => "https://i.imgur.com/zAp81Ko.png",
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

        DB::table('zaglebiesosnowiec')->insert($clubs);
    }
}