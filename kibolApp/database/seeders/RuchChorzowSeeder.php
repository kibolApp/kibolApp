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
        $coordinates = [
            ["lat" => 50.492464068375, "lng" => 18.81813665616221],
            ["lat" => 50.29532122717043, "lng" => 18.838344825983086],
            ["lat" => 50.286601693478815, "lng" => 18.71764217644042],
            ["lat" => 50.16959571969653, "lng" => 18.725319269392287],
            ["lat" => 50.17700394852656, "lng" => 18.984856811738865],
            ["lat" => 50.287498618970034, "lng" => 18.967442417305875],
            ["lat" => 50.28986089838088, "lng" => 18.96910608148076],
            ["lat" => 50.29544557754426, "lng" => 18.969362275588054],
            ["lat" => 50.296520139794325, "lng" => 18.971029310594247],
            ["lat" => 50.49501545343307, "lng" => 18.957316581051828],
            ["lat" => 50.492464068375, "lng" => 18.81813665616221],
        ];

        $clubs = [
            [
                'name' => "Ruch Chorzów",
                'url_logo' => "https://i.imgur.com/Din3ueS.png",
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

        DB::table('ruchchorzow')->insert($clubs);
    }
}
