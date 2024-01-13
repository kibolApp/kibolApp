<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OdraOpoleSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Polonia Bytom", "Zagłębie Lubin"];
        $negativeClubs = [
            "Chemik Kędzierzyn-Koźle", "Śląsk Wrocław", "Górnik Zabrze", "GKS Katowice", "Zagłębie Sosnowiec",
            "Piast Gliwice", "Raków Częstochowa", "GKS Jastrzębie", "BKS Stal Bielsko-Biała", "Podbeskidzie Bielsko-Biała",
            "Miedź Legnica", "Chrobry Głogów", "Start Namysłów", "Stal Brzeg", "Włókniarz Kietrz", "Motor Lublin",
            "ŁKS Łódź", "Widzew Łódź", "Wisła Kraków", "Elana Toruń"
        ];
        $coordinates = [
            ["lat" => 50.41821291233612, "lng" => 17.026133469854443],
            ["lat" => 50.406219783087494, "lng" => 17.11665706618345],
            ["lat" => 50.38105409730187, "lng" => 17.15055092665051],
            ["lat" => 50.389439667168205, "lng" => 17.19955765473904],
            ["lat" => 50.354718910897674, "lng" => 17.212621081798602],
            ["lat" => 50.32004940916639, "lng" => 17.287701527880955],
            ["lat" => 50.32602325675927, "lng" => 17.34603420584412],
            ["lat" => 50.26754507892446, "lng" => 17.345572427483802],
            ["lat" => 50.28066013722781, "lng" => 17.36820978467543],
            ["lat" => 50.27708257480802, "lng" => 17.424507165024977],
            ["lat" => 50.25682003729494, "lng" => 17.435554750624675],
            ["lat" => 50.26873705352176, "lng" => 17.454454054865266],
            ["lat" => 50.27708257480802, "lng" => 17.584103696365332],
            ["lat" => 50.26754507892446, "lng" => 17.61961968143018],
            ["lat" => 50.29974970086056, "lng" => 17.678402941666775],
            ["lat" => 50.32482836554615, "lng" => 17.678866677040162],
            ["lat" => 50.30448684321567, "lng" => 17.753259562983743],
            ["lat" => 50.26371008174502, "lng" => 17.73405705294016],
            ["lat" => 50.236552724961, "lng" => 17.76709208111086],
            ["lat" => 50.2003766728061, "lng" => 17.75977115039413],
            ["lat" => 50.16480957692832, "lng" => 17.606916051490828],
            ["lat" => 50.137360184387774, "lng" => 17.621952978579543],
            ["lat" => 50.10279587074186, "lng" => 17.668808165017936],
            ["lat" => 50.119475719520636, "lng" => 17.685685528484214],
            ["lat" => 50.09922316380121, "lng" => 17.7362280979859],
            ["lat" => 50.03263266420066, "lng" => 17.773419301190415],
            ["lat" => 50.01008253213985, "lng" => 17.83122303047196],
            ["lat" => 49.98281414397195, "lng" => 17.83666190964766],
            ["lat" => 49.97807507040585, "lng" => 17.916855665715815],
            ["lat" => 50.012455204087104, "lng" => 18.040416611576205],
            ["lat" => 50.04213397917138, "lng" => 18.01087629311283],
            ["lat" => 50.064715107920904, "lng" => 18.03358645943112],
            ["lat" => 51.355602544103164, "lng" => 18.17505172786096],
            ["lat" => 51.32112257653449, "lng" => 18.100278712024306],
            ["lat" => 51.127411850349375, "lng" => 18.05226721000068],
            ["lat" => 51.12379861964831, "lng" => 17.83318867106283],
            ["lat" => 51.18164346348715, "lng" => 17.87063038808529],
            ["lat" => 51.18526111481802, "lng" => 17.799450194440055],
            ["lat" => 51.078656541316576, "lng" => 17.55151922561876],
            ["lat" => 50.62067128316687, "lng" => 17.20836258598345],
            ["lat" => 50.43121979540379, "lng" => 17.065296611578134],
            ["lat" => 50.41821291233612, "lng" => 17.026133469854443],
        ];


        $clubs = [
            [
                'name' => "Odra Opole",
                'url_logo' => "https://i.imgur.com/8j6dBw6.png",
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
        DB::table('odraopole')->insert($clubs);
    }
}
