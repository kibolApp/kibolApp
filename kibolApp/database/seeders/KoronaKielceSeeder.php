<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KoronaKielceSeeder extends Seeder
{
    public function run()
    {
        $negativeClubs = [
            "Wisła Kraków", "KSZO Ostrowiec Św.", "Radomiak Radom", "Broń Radom", "Lech Poznań",
            "Arka Gdynia", "Legia Warszawa", "Zagłębie Sosnowiec", "Jagiellonia Białystok",
            "Motor Lublin", "Widzew Łódź", "Ruch Chorzów", "Elana Toruń", "Lechia Gdańsk",
            "Wisła Sandomierz", "Hetman Włoszczowa", "Star Starachowice",
            "Granat Skarżysko-Kamienna", "Pogoń Staszów", "Ceramika Opoczno", "Powiślanka Lipsko",
            "Wisła Płock", "Hetman Zamość", "Górnik Łęczna", "Stomil Olsztyn", "GKS Jastrzębie",
            "Raków Częstochowa"
        ];

        $clubs = [
            [
                'name' => "Korona Kielce",
                'url_logo' => "https://i.imgur.com/UG6yqUi.png",
                'positive' => null,
                'negative' => null,
            ],
        ];

        foreach ($negativeClubs as $club) {
            $clubs[] = ['name' => null, 'url_logo' => null, 'positive' => null, 'negative' => $club];
        }

        DB::table('koronakielce')->insert($clubs);
    }
}
