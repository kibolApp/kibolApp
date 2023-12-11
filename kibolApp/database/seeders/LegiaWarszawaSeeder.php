<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegiaWarszawaSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = [
            "Zagłębie Sosnowiec",
            "Olimpia Elbląg",
            "Radomiak Radom"
        ];

        $negativeClubs = [
            "Lech Poznań", "Cracovia", "Widzew Łódź", "Ruch Chorzów", "Wisła Kraków", "Elana Toruń", 
            "Lechia Gdańsk", "Śląsk Wrocław", "Polonia Warszawa", "Stomil Olsztyn", "Jagiellonia Białystok", 
            "Zawisza Bydgoszcz", "Motor Lublin", "Wisła Płock", "ŁKS Łódź", "Korona Kielce", "Górnik Zabrze", 
            "GKS Katowice", "Polonia Bytom", "GKS Tychy", "Piast Gliwice", "GKS Jastrzębie", 
            "BKS Stal Bielsko-Biała", "Raków Częstochowa", "Zagłębie Lubin", "Miedź Legnica", "Hutnik Kraków", 
            "Unia Tarnów", "Tarnovia Tarnów", "Sandecja Nowy Sącz", "KSZO Ostrowiec Św.", "Broń Radom", 
            "Powiślanka Lipsko", "Gwardia Warszawa", "Górnik Łęczna", "Hetman Zamość", "Chełmianka Chełm", 
            "Avia Świdnik", "Stal Mielec", "Resovia Rzeszów", "Polonia Przemyśl", "Stal Stalowa Wola", 
            "Karpaty Krosno", "Stal Rzeszów", "Warta Poznań", "KKS Kalisz"
        ];

        $clubs = [
            [
                'name' => "Legia Warszawa",
                'url_logo' => "https://i.imgur.com/484NrE2.png",
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

        DB::table('legiawarszawa')->insert($clubs);
    }
}
