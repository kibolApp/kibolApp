<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GornikZabrzeSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["GKS Katowice", "Wisłoka Dębica", "ROW Rybnik"];
        $negativeClubs = ["Ruch Chorzów", "Wisła Kraków", "Widzew Łódź", "Elana Toruń", "Legia Warszawa", 
                          "Zagłębie Sosnowiec", "Polonia Bytom", "GKS Tychy", "Piast Gliwice", "GKS Jastrzębie", 
                          "Odra Wodzisław Śl.", "Raków Częstochowa", "BKS Stal Bielsko-Biała", "Odra Opole", 
                          "Chemik Kędzierzyn-Koźle", "Śląsk Wrocław", "Lechia Gdańsk", "Stomil Olsztyn", 
                          "Wisła Płock", "Olimpia Elbląg", "Arka Gdynia", "Radomiak Radom", "Miedź Legnica", 
                          "Górnik Wałbrzych", "Chrobry Głogów", "KS Myszków", "Ruch Radzionków", "Igloopol Dębica", 
                          "Stal Rzeszów", "Karpaty Krosno", "Stal Mielec", "Sandecja Nowy Sącz", "Hutnik Kraków", 
                          "GKS Bełchatów", "KKS Kalisz", "Pogoń Szczecin"];

        $clubs = [
            [
                'name' => "Górnik Zabrze",
                'url_logo' => "https://i.imgur.com/G01NIvs.png",
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

        DB::table('gornikzabrze')->insert($clubs);
    }
}
