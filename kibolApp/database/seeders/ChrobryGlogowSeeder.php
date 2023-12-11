<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChrobryGlogowSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Stilon Gorzów Wlkp."];

        $negativeClubs = [
            "Zagłębie Lubin", "Śląsk Wrocław", "Miedź Legnica", "Polonia Świdnica", "Falubaz Zielona Góra", 
            "Promień Żary", "Stal Gorzów Wlkp.", "Dozamet Nowa Sól", "Karkonosze Jelenia Góra", 
            "Górnik Polkowice", "Odra Wodzisław Śl.", "Ostrovia Ostrów Wlkp.", "Lech Poznań", "Gwardia Koszalin", 
            "Flota Świnoujście", "Odra Opole", "Górnik Konin"
        ];

        $clubs = [
            [
                'name' => "Chrobry Głogów",
                'url_logo' => "https://i.imgur.com/sBRFtDF.png",
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

        DB::table('chrobryglogow')->insert($clubs);
    }
}
