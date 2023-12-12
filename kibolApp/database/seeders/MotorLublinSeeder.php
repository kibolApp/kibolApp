<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorLublinSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Śląsk Wrocław"];
        $negativeClubs = [
            "Wisła Kraków", "Widzew Łódź", "Ruch Chorzów", "Elana Toruń", "Stal Stalowa Wola", "Avia Świdnik", 
            "Łada Biłgoraj", "Wisła Puławy", "Polonia Przemyśl", "Stal Rzeszów", "Karpaty Krosno", 
            "Stal Mielec", "Siarka Tarnobrzeg", "Sokół Nisko", "Arka Gdynia", "Cracovia", "GKS Tychy", 
            "Lech Poznań", "Sandecja Nowy Sącz", "Unia Tarnów", "Hutnik Kraków", "GKS Jastrzębie", 
            "Korona Kielce", "ŁKS Łódź", "Legia Warszawa", "Radomiak Radom", "Polonia Warszawa", 
            "Wisła Płock", "Odra Opole", "Zagłębie Lubin", "Chrobry Głogów", "Górnik Wałbrzych", 
            "AZS Podlasie Biała Podlaska", "Orlęta Łuków", "Unia Hrubieszów", "KKS Kalisz", 
            "Falubaz Zielona Góra", "Pogoń Szczecin", "Stomil Olsztyn", "Korona Rzeszów", "Olimpia Elbląg"
        ];

        $clubs = [
            [
                'name' => "Motor Lublin",
                'url_logo' => "https://i.imgur.com/wya3bMw.png",
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

        DB::table('motorlublin')->insert($clubs);
    }
}
