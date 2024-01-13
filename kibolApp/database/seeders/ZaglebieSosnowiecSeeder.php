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
        $coordinates = [
            ["lat" => 50.49912591640722, "lng" => 19.126933149876436],
            ["lat" => 50.19466057814972, "lng" => 19.073193041787846],
            ["lat" => 50.18225656063987, "lng" => 19.337591056880427],
            ["lat" => 50.50416771857775, "lng" => 19.41530034165035],
            ["lat" => 50.49912591640722, "lng" => 19.126933149876436],
        ];


        $clubs = [
            [
                'name' => "Zagłębie Sosnowiec",
                'url_logo' => asset('zaglebiesosnowiec.png'),
                'positive' => null,
                'negative' => null,
                'lat'=>null,
                'lng'=>null,
            ],
        ];

        foreach ($coordinates as $coordinate) {
            $clubs[]=[
                'name' => null,
                'url_logo' => null,
                'positive' => null,
                'negative' => null,
                'lat' => $coordinate['lat'],
                'lng' => $coordinate['lng'],
            ];
        };

        foreach ($positiveClubs as $club) {
            $clubs[] = ['name' => null, 'url_logo' => null, 'positive' => $club, 'negative' => null, 'lat'=>null,
            'lng'=>null,];
        }

        foreach ($negativeClubs as $club) {
            $clubs[] = ['name' => null, 'url_logo' => null, 'positive' => null, 'negative' => $club, 'lat'=>null,
            'lng'=>null,];
        }

        DB::table('zaglebiesosnowiec')->insert($clubs);
    }
}
