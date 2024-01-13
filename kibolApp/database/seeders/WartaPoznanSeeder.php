<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WartaPoznanSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Błekitni Stargard", "Lechia Zielona Góra"];
        $negativeClubs = [
            "KKS Kalisz", "Unia Leszno", "Pogoń Szczecin", "Dyskobolia Grodzisk Wielkopolski",
            "Wisła Kraków", "Ruch Chorzów", "Widzew Łódź", "Elana Toruń", "Kotwica Kołobrzeg",
            "Radomiak Radom", "Lechia Gdańsk", "Śląsk Wrocław", "Piast Gliwice"
        ];
        $coordinates = [
            ["lat" => 52.398029736232985, "lng" => 16.926746517595518],
            ["lat" => 52.391735370726025, "lng" => 16.92446298968818],
            ["lat" => 52.12749423840535, "lng" => 17.38799876896701],
            ["lat" => 52.245217403347056, "lng" => 19.19604319163372],
            ["lat" => 52.40509954891033, "lng" => 19.274399259122816],
            ["lat" => 52.5126952926953, "lng" => 19.378407019619146],
            ["lat" => 52.52938250079757, "lng" => 19.336404745330555],
            ["lat" => 52.607583400302445, "lng" => 19.41659643611399],
            ["lat" => 52.63202261896686, "lng" => 19.366604462371697],
            ["lat" => 52.68139737836421, "lng" => 19.438630559523233],
            ["lat" => 52.72541935324489, "lng" => 19.445386365830984],
            ["lat" => 52.71287138450296, "lng" => 19.51700829228693],
            ["lat" => 52.834102292855476, "lng" => 19.422582029923745],
            ["lat" => 52.87202595281522, "lng" => 19.49755496107349],
            ["lat" => 52.94307973433115, "lng" => 19.436735595972152],
            ["lat" => 52.957730274543025, "lng" => 19.559528031404795],
            ["lat" => 52.9853823584867, "lng" => 19.55907703545668],
            ["lat" => 52.9592046728921, "lng" => 19.677364172249526],
            ["lat" => 53.10681592479932, "lng" => 19.624028140966487],
            ["lat" => 53.1500264867403, "lng" => 19.751391590757123],
            ["lat" => 53.23011536003972, "lng" => 19.693406557121136],
            ["lat" => 53.32337911054361, "lng" => 19.729809906249727],
            ["lat" => 53.438726432471555, "lng" => 19.356522106415326],
            ["lat" => 53.599862797254644, "lng" => 19.137345040523314],
            ["lat" => 53.65541164229589, "lng" => 18.77644072038484],
            ["lat" => 53.770488412243935, "lng" => 18.93276274013874],
            ["lat" => 53.694940981602116, "lng" => 18.45282054578746],
            ["lat" => 53.74927216824332, "lng" => 18.24631625410177],
            ["lat" => 53.76969742736006, "lng" => 18.059130995240025],
            ["lat" => 53.75164553361557, "lng" => 17.86897798586989],
            ["lat" => 53.68997057858351, "lng" => 17.748974760112787],
            ["lat" => 53.62079441848917, "lng" => 17.722847587236544],
            ["lat" => 52.8703244066071, "lng" => 17.80629204204672],
            ["lat" => 52.489602860698, "lng" => 16.99207360170061],
            ["lat" => 52.41500647549449, "lng" => 16.921522942769542],
            ["lat" => 52.398029736232985, "lng" => 16.926746517595518],
        ];


        $clubs = [
            [
                'name' => "Warta Poznań",
                'url_logo' => "https://i.imgur.com/pHbkZBs.png",
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
        DB::table('wartapoznan')->insert($clubs);
    }
}
