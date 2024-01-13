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
        $coordinates = [
            ["lat" => 51.20338348450247, "lng" => 22.589545546232415],
            ["lat" => 51.23739242457205, "lng" => 22.684821052394767],
            ["lat" => 52.24473170427106, "lng" => 22.335964903745435],
            ["lat" => 52.10946902913335, "lng" => 22.185180418341133],
            ["lat" => 52.07046308907732, "lng" => 21.855671742192243],
            ["lat" => 51.027843336650704, "lng" => 21.78649685027176],
            ["lat" => 50.777668173889595, "lng" => 21.885803796134496],
            ["lat" => 50.817607337477284, "lng" => 22.060471309400157],
            ["lat" => 50.8035031992635, "lng" => 22.15327596717688],
            ["lat" => 50.75889738401423, "lng" => 22.19928319037615],
            ["lat" => 50.67111446363148, "lng" => 22.15034721264493],
            ["lat" => 50.62659990771505, "lng" => 22.250653798018732],
            ["lat" => 50.58020235076438, "lng" => 22.513701688989187],
            ["lat" => 50.472303166531276, "lng" => 22.56539360783779],
            ["lat" => 50.41087303104456, "lng" => 22.411266906647597],
            ["lat" => 50.354313940735466, "lng" => 22.485297966346423],
            ["lat" => 50.35784479579374, "lng" => 22.69995074175108],
            ["lat" => 50.310811466048875, "lng" => 22.61269496638218],
            ["lat" => 50.302372446807226, "lng" => 22.97829133956273],
            ["lat" => 51.20338348450247, "lng" => 22.589545546232415],
        ];
        

        $clubs = [
            [
                'name' => "Motor Lublin",
                'url_logo' => "https://i.imgur.com/wya3bMw.png",
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
        DB::table('motorlublin')->insert($clubs);
    }
}
