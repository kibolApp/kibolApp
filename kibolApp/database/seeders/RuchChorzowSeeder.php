<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuchChorzowSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Widzew Łódź", "Elana Toruń", "Wisła Kraków"];
        $negativeClubs = [
            "Górnik Zabrze", "GKS Katowice", "Legia Warszawa", "Zagłębie Sosnowiec", 
            "Raków Częstochowa", "GKS Tychy", "ROW Rybnik", "Cracovia", "Lech Poznań", 
            "Arka Gdynia", "Radomiak Radom", "ŁKS Łódź", "Zawisza Bydgoszcz", 
            "Włocłavia Włocławek", "Olimpia Elbląg", "Pogoń Szczecin", "Lechia Gdańsk", 
            "Śląsk Wrocław", "Motor Lublin", "Miedź Legnica", "Zagłębie Lubin", 
            "Górnik Wałbrzych", "BKS Stal Bielsko-Biała", "Góral Żywiec", "Odra Wodzisław Śl.", 
            "Wisłoka Dębica", "Resovia Rzeszów", "Czuwaj Przemyśl", "JKS Jarosław", 
            "Siarka Tarnobrzeg", "Korona Kielce", "KSZO Ostrowiec Św.", "GKS Bełchatów", 
            "Hetman Zamość", "Chełmianka Chełm", "Górnik Łęczna", "Pogoń Lębork", 
            "Chojniczanka Chojnice", "Gwardia Koszalin", "Apator Toruń", "Legia Chełmża", 
            "Polonia Warszawa", "Odra Opole", "Hutnik Kraków", "Tarnovia Tarnów", 
            "Beskid Andrychów", "Sandecja Nowy Sącz", "Hajduk Split", "Banik Ostrava", 
            "Spartak Trnava", "Real Madryt", "Spartak Moskwa", "Ajax Amsterdam"
        ];

        $clubs = [
            [
                'name' => "Ruch Chorzów",
                'url_logo' => "https://i.imgur.com/Din3ueS.png",
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

        DB::table('ruchchorzow')->insert($clubs);
    }
}
