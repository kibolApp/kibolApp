<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RadomiakRadomSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Legia Warszawa"];
        $negativeClubs = [
            "Broń Radom", "Powiślanka Lipsko", "Korona Kielce", "KSZO Ostrowiec Św.", "Widzew Łódź", 
            "Ruch Chorzów", "Wisła Kraków", "Elana Toruń", "Polonia Warszawa", "Wisła Płock", 
            "Motor Lublin", "Hetman Zamość", "Chełmianka Chełm", "Górnik Łęczna", "Wisła Puławy", 
            "Avia Świdnik", "Resovia Rzeszów", "Stal Mielec", "Stal Stalowa Wola", "Sandecja Nowy Sącz", 
            "GKS Tychy", "Górnik Zabrze", "GKS Katowice", "GKS Jastrzębie", "Raków Częstochowa", 
            "Śląsk Wrocław", "Lechia Gdańsk", "ŁKS Łódź", "Cracovia", "Lech Poznań", "Arka Gdynia", 
            "Stomil Olsztyn", "Jagiellonia Białystok", "Gwardia Warszawa", "Pilica Białobrzegi", 
            "Miedź Legnica"
        ];

        $clubs = [
            [
                'name' => "Radomiak Radom",
                'url_logo' => "https://i.imgur.com/2nVnU9F.png",
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

        DB::table('radomiakradom')->insert($clubs);
    }
}
