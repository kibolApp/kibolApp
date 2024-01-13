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
        $coordinates = [
            [
                ["lat" => 51.70119825884055, "lng" => 16.683537504191094],
                ["lat" => 52.370499799955724, "lng" => 15.846972831924717],
                ["lat" => 52.334620528526216, "lng" => 15.837926155717838],
                ["lat" => 52.33186087686195, "lng" => 14.60489671628551],
                ["lat" => 52.29047112517304, "lng" => 14.596555469652799],
                ["lat" => 52.24357415832097, "lng" => 14.717227971650004],
                ["lat" => 52.11398140121014, "lng" => 14.687698311983326],
                ["lat" => 52.06640982314633, "lng" => 14.760985269233402],
                ["lat" => 51.97589403205504, "lng" => 14.70770456105322],
                ["lat" => 51.9491694220863, "lng" => 14.723005333146602],
                ["lat" => 51.89233903294917, "lng" => 14.684508255940301],
                ["lat" => 51.84027302834255, "lng" => 14.603234302689089],
                ["lat" => 51.8113991266236, "lng" => 14.592535515734113],
                ["lat" => 51.79409246517841, "lng" => 14.644912139122681],
                ["lat" => 51.75777966161854, "lng" => 14.65862875196592],
                ["lat" => 51.72596080726845, "lng" => 14.66958313205501],
                ["lat" => 51.68652603111937, "lng" => 14.734893314823722],
                ["lat" => 51.66060953437449, "lng" => 14.7614131801719],
                ["lat" => 51.61318092610534, "lng" => 14.762169553950258],
                ["lat" => 51.56720384390161, "lng" => 14.720572778331189],
                ["lat" => 51.527084578001165, "lng" => 14.736760016835518],
                ["lat" => 51.51425511335174, "lng" => 14.816995008874528],
                ["lat" => 51.48700650094855, "lng" => 14.863836515934139],
                ["lat" => 51.4832670856413, "lng" => 14.91804542958451],
                ["lat" => 51.45254140044267, "lng" => 14.96510489259856],
                ["lat" => 51.40402218172042, "lng" => 14.966945245728937],
                ["lat" => 51.58960036986079, "lng" => 16.19212035642923],
                ["lat" => 51.59040122286197, "lng" => 16.674623658255],
                ["lat" => 51.70119825884055, "lng" => 16.683537504191094]
            ]
        ];


        $clubs = [
            [
                'name' => "Chrobry Głogów",
                'url_logo' => "https://i.imgur.com/sBRFtDF.png",
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

        DB::table('chrobryglogow')->insert($clubs);
    }
}
