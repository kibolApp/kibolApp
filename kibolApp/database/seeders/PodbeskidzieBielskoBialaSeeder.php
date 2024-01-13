<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PodbeskidzieBielskoBialaSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = [];

        $negativeClubs = [
            "BKS Stal Bielsko-Biała", "Miedź Legnica", "Zagłębie Sosnowiec", "Szczakowianka Jaworzno",
            "Wisła Kraków", "Legia Warszawa", "Odra Opole", "Śląsk Wrocław", "Lechia Gdańsk",
            "MRKS Walcownia Czechowice-Dziedzice", "Hejnał Kęty"
        ];
        $coordinates = [
            ["lat" => 49.923036160243726, "lng" => 18.570794542203544],
            ["lat" => 49.89887458776843, "lng" => 18.575490482322664],
            ["lat" => 49.87976962487653, "lng" => 18.570840749034915],
            ["lat" => 49.8636969418917, "lng" => 18.600395763918073],
            ["lat" => 49.82658376639756, "lng" => 18.575554767101806],
            ["lat" => 49.74460523704386, "lng" => 18.626697446628526],
            ["lat" => 49.71968616176633, "lng" => 18.634401423518398],
            ["lat" => 49.712715031481366, "lng" => 18.66221431786542],
            ["lat" => 49.70674193760513, "lng" => 18.705469205255042],
            ["lat" => 49.6798876720506, "lng" => 18.731603452705087],
            ["lat" => 49.683863537647284, "lng" => 18.790294988414445],
            ["lat" => 49.672876273329535, "lng" => 18.80872437174301],
            ["lat" => 49.596840119580776, "lng" => 18.8347852159049],
            ["lat" => 49.5211250514414, "lng" => 18.843739583749738],
            ["lat" => 49.51516116767911, "lng" => 18.950050963220463],
            ["lat" => 49.49529591564439, "lng" => 18.976065139090906],
            ["lat" => 49.45662211727867, "lng" => 18.96494208728967],
            ["lat" => 49.42989697796477, "lng" => 18.992354640531545],
            ["lat" => 49.41111439458078, "lng" => 18.969143263708503],
            ["lat" => 49.39728726193533, "lng" => 18.97822329631782],
            ["lat" => 49.399261909148095, "lng" => 19.04421662257718],
            ["lat" => 49.4200089390267, "lng" => 19.072103272762718],
            ["lat" => 49.40321186089486, "lng" => 19.11638657426718],
            ["lat" => 49.41111439458078, "lng" => 19.133387530855572],
            ["lat" => 49.41210245795199, "lng" => 19.199409879198413],
            ["lat" => 49.443749456621475, "lng" => 19.192290602555005],
            ["lat" => 49.44968952997161, "lng" => 19.218528415259044],
            ["lat" => 49.46454837490165, "lng" => 19.228033264102976],
            ["lat" => 49.47148674000897, "lng" => 19.215856311200895],
            ["lat" => 49.532064007330376, "lng" => 19.260154586620814],
            ["lat" => 49.53902864599769, "lng" => 19.306570331631264],
            ["lat" => 49.5300746085251, "lng" => 19.317168115716186],
            ["lat" => 49.53604346883441, "lng" => 19.362029190733807],
            ["lat" => 49.568907833285465, "lng" => 19.370540431682798],
            ["lat" => 49.575885231174965, "lng" => 19.40777851891565],
            ["lat" => 49.58885047009437, "lng" => 19.40811247375879],
            ["lat" => 49.59883011739612, "lng" => 19.43928686361727],
            ["lat" => 49.61081303121529, "lng" => 19.445796072420364],
            ["lat" => 49.61281096215433, "lng" => 19.46750402961328],
            ["lat" => 49.77391679403232, "lng" => 19.419292364116785],
            ["lat" => 49.86785245775667, "lng" => 19.11284450585464],
            ["lat" => 49.923036160243726, "lng" => 18.570794542203544],
        ];


        $clubs = [
            [
                'name' => "Podbeskidzie Bielsko-Biała",
                'url_logo' => "https://i.imgur.com/07rCZxP.png",
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

        DB::table('podbeskidziebielskobiala')->insert($clubs);
    }
}
