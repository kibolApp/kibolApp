<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlaskWroclawSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Lechia Gdańsk", "Motor Lublin", "Miedź Legnica"];
        $negativeClubs = [
            "Zagłębie Lubin", "Ruch Chorzów", "Wisła Kraków", "Elana Toruń", "Widzew Łódź", "Cracovia",
            "Arka Gdynia", "Lech Poznań", "Legia Warszawa", "Odra Opole", "Górnik Zabrze", "Polonia Bytom",
            "GKS Tychy", "GKS Jastrzębie", "Górnik Wałbrzych", "Chrobry Głogów", "BKS Bolesławiec",
            "Polonia Świdnica", "Lechia Dzierżoniów", "KKS Kalisz", "Zawisza Bydgoszcz", "Pogoń Szczecin",
            "Olimpia Elbląg", "Jagiellonia Białystok", "ROW Rybnik", "Radomiak Radom", "Sandecja Nowy Sącz",
            "Stal Rzeszów", "Stal Stalowa Wola", "Avia Świdnik", "Sevilla FC", "CSKA Moskwa",
            "Banik Ostrava", "Borussia Dortmund"
        ];
        $coordinates = [
            ["lat" => 51.59000775199408, "lng" => 16.672249921883946],
            ["lat" => 51.59160156849845, "lng" => 16.659195892812477],
            ["lat" => 51.560397269455706, "lng" => 16.37713300783625],
            ["lat" => 50.767369841313524, "lng" => 16.151243181636886],
            ["lat" => 50.76119705858042, "lng" => 15.803215450913768],
            ["lat" => 50.66758939322716, "lng" => 15.871325675286528],
            ["lat" => 50.685888519558006, "lng" => 15.973847117426146],
            ["lat" => 50.600539304268295, "lng" => 16.028718515018397],
            ["lat" => 50.66149089733233, "lng" => 16.108633395340064],
            ["lat" => 50.635071091533746, "lng" => 16.20804429856429],
            ["lat" => 50.671655393972, "lng" => 16.224056759794877],
            ["lat" => 50.66381008530328, "lng" => 16.33036699848188],
            ["lat" => 50.57904875317928, "lng" => 16.44907963448776],
            ["lat" => 50.42618329204248, "lng" => 16.20199237188993],
            ["lat" => 50.10287951764957, "lng" => 16.702412582610663],
            ["lat" => 50.23985368751525, "lng" => 16.97126036552109],
            ["lat" => 50.22841136433681, "lng" => 17.02719285502681],
            ["lat" => 50.3200919801354, "lng" => 16.94205641145672],
            ["lat" => 50.40953793199631, "lng" => 16.8604583621063],
            ["lat" => 50.44283931216947, "lng" => 16.884906832996876],
            ["lat" => 50.415938732501445, "lng" => 17.001451444457615],
            ["lat" => 50.42883769132621, "lng" => 17.06124394358963],
            ["lat" => 51.07670059995277, "lng" => 17.5549508631388],
            ["lat" => 51.42341753933917, "lng" => 18.329963276372638],
            ["lat" => 51.62792930623465, "lng" => 17.49958760178609],
            ["lat" => 51.65224143053271, "lng" => 17.22716424341297],
            ["lat" => 51.59000775199408, "lng" => 16.672249921883946],
        ];


        $clubs = [
            [
                'name' => "Śląsk Wrocław",
                'url_logo' => "https://i.imgur.com/nTw642F.png",
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

        DB::table('slaskwroclaw')->insert($clubs);
    }
}
