<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CracoviaKrakowSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Arka Gdynia", "Lech Poznań", "GKS Tychy", "Sandecja Nowy Sącz", "Tarnovia Tarnów"];
        $negativeClubs = ["Wisła Kraków", "Ruch Chorzów", "Widzew Łódź", "Elana Toruń", "Unia Tarnów", 
                          "Legia Warszawa", "Zagłębie Sosnowiec", "Śląsk Wrocław", "Lechia Gdańsk", 
                          "Pogoń Szczecin", "Jagiellonia Białystok", "Radomiak Radom", "Motor Lublin", 
                          "Polonia Przemyśl", "Resovia Rzeszów", "Okocimski Brzesko", "Unia Oświęcim", 
                          "Hejnał Kęty", "Glinik Gorlice", "Podhale Nowy Targ", "Karpaty Krosno", 
                          "Wisłoka Dębica", "Piast Gliwice", "Raków Częstochowa", "Miedź Legnica", 
                          "KKS Kalisz", "Hetman Zamość", "Stomil Olsztyn"];

        $clubs = [
            [
                'name' => "Cracovia Kraków",
                'url_logo' => "https://i.imgur.com/B82c3Ze.png",
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

        DB::table('cracoviakrakow')->insert($clubs);
    }
}
