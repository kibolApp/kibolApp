<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZaglebieLubinSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Arka Gdynia", "Odra Opole", "Zawisza Bydgoszcz"];
        
        $negativeClubs = [
            "Śląsk Wrocław", "Chrobry Głogów", "Miedź Legnica", "Wisła Kraków", "Ruch Chorzów", 
            "Widzew Łódź", "Elana Toruń", "Legia Warszawa", "Zagłębie Sosnowiec", "Raków Częstochowa", 
            "BKS Stal Bielsko-Biała", "Chemik Kędzierzyn-Koźle", "Start Namysłów", "Stal Gorzów Wlkp.", 
            "Stilon Gorzów Wlkp.", "Flota Świnoujście", "Lechia Gdańsk", "Stal Brzeg", "Moto-Jelcz Oława", 
            "Piast Nowa Ruda", "Karkonosze Jelenia Góra", "Bielewianka Bielawa", "Lechia Dzierżoniów", 
            "Zagłębie Wałbrzych", "Czuwaj Przemyśl"
        ];

        $clubs = [
            [
                'name' => "Zagłębie Lubin",
                'url_logo' => "https://i.imgur.com/ASAxV9N.png",
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

        DB::table('zaglebielubin')->insert($clubs);
    }
}
