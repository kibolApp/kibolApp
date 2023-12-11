<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlaskWroclawSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Lechia Gdańsk", "Motor Lublin", "Miedź Legnica"];
        $negativeClubs = [
            "Zagłębie Lubin", "Ruch Chorzów", "Wisła Kraków", "Elana Toruń", "Widzew Łódź", "Cracovia", 
            "Arka Gdynia", "Lech Poznań", "Legia Warszawa", "Odra Opole", "Górnik Zabrze", "Polonia Bytom", 
            "GKS Tychy", "GKS Jastrzębie", "Górnik Wałbrzych", "Chrobry Głogów", "BKS Bolesławiec", 
            "Polonia Świdnica", "Lechia Dzierżoniów", "KKS Kalisz", "Zawisza Bydgoszcz", "Pogoń Szczecin", 
            "Olimpia Elbląg", "Jagiellonia Białystok", "ROW Rybnik", "Radomiak Radom", "Sandecja Nowy Sącz", 
            "Stal Rzeszów", "Stal Stalowa Wola", "Avia Świdnik", "Sevilla FC", "CSKA Moskwa", 
            "Banik Ostrava", "Borussia Dortmund"
        ];

        $clubs = [
            [
                'name' => "Śląsk Wrocław",
                'url_logo' => "https://i.imgur.com/nTw642F.png",
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

        DB::table('slaskwroclaw')->insert($clubs);
    }
}
