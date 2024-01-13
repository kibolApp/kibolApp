<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LechPoznanSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = [
            "Arka Gdynia", "Cracovia", "KSZO Ostrowiec Św.", "ŁKS Łódź"
        ];

        $negativeClubs = [
            "Wisła Kraków", "Ruch Chorzów", "Widzew Łódź", "Elana Toruń", "Legia Warszawa",
            "Olimpia Elbląg", "Zagłębie Sosnowiec", "Radomiak Radom", "Korona Kielce",
            "Lechia Gdańsk", "Śląsk Wrocław", "Pogoń Szczecin", "KKS Kalisz", "Unia Leszno",
            "Miedź Legnica", "BKS Stal Bielsko-Biała", "Piast Gliwice", "Raków Częstochowa",
            "Stal Rzeszów", "Karpaty Krosno", "Stal Stalowa Wola", "Polonia Przemyśl",
            "Resovia Rzeszów", "Czuwaj Przemyśl", "Polonia Warszawa", "Stomil Olsztyn",
            "Jagiellonia Białystok", "Stilon Gorzów Wlkp.", "Polonia Bydgoszcz", "Kotwica Kołobrzeg"
        ];
        $coordinates = [
            ["lat" => 53.66005678592293, "lng" => 16.8617029328731],
            ["lat" => 53.09569291671488, "lng" => 15.985349928708104],
            ["lat" => 52.36983197091419, "lng" => 15.858810357145842],
            ["lat" => 52.130503662192865, "lng" => 15.883963227887989],
            ["lat" => 52.106003012494284, "lng" => 15.840498078032795],
            ["lat" => 52.07144496725272, "lng" => 15.91859261793229],
            ["lat" => 52.09094791808002, "lng" => 15.94247466155582],
            ["lat" => 52.05983746973516, "lng" => 16.0038271913306],
            ["lat" => 52.01776484763673, "lng" => 15.97228317295216],
            ["lat" => 51.98114071361866, "lng" => 16.037023714094005],
            ["lat" => 51.99749272084466, "lng" => 16.11783056579125],
            ["lat" => 51.898044576839936, "lng" => 16.114089689793815],
            ["lat" => 51.8767716126479, "lng" => 16.210802646481227],
            ["lat" => 51.90114113074901, "lng" => 16.257398024323805],
            ["lat" => 51.880519469860985, "lng" => 16.34755852449598],
            ["lat" => 51.787011810463355, "lng" => 16.408505398603467],
            ["lat" => 51.784344336204555, "lng" => 16.539081571327017],
            ["lat" => 51.74736717833213, "lng" => 16.59584707634707],
            ["lat" => 51.75040664973287, "lng" => 16.630779464033907],
            ["lat" => 51.70528000769045, "lng" => 16.682436919864784],
            ["lat" => 51.677590448217614, "lng" => 16.63683897821062],
            ["lat" => 51.65575798015132, "lng" => 16.635132798462365],
            ["lat" => 51.64303747285058, "lng" => 16.782275634217484],
            ["lat" => 51.56586372015917, "lng" => 16.81911117439833],
            ["lat" => 51.5745580412684, "lng" => 17.21311241606395],
            ["lat" => 51.651487751222675, "lng" => 17.236848904570138],
            ["lat" => 51.629730147223995, "lng" => 17.501510273539793],
            ["lat" => 51.41602668746438, "lng" => 17.560815974298833],
            ["lat" => 51.41443339005994, "lng" => 17.752913289002294],
            ["lat" => 51.1941012563793, "lng" => 17.78762172720377],
            ["lat" => 51.18237443853326, "lng" => 17.861016837598697],
            ["lat" => 51.12516602208123, "lng" => 17.829935739131543],
            ["lat" => 51.12323370462394, "lng" => 17.97237783803456],
            ["lat" => 51.17795637284942, "lng" => 18.181907986547543],
            ["lat" => 51.26700942702769, "lng" => 18.11927220579014],
            ["lat" => 51.362709467457734, "lng" => 18.084947367469283],
            ["lat" => 51.416928504042545, "lng" => 18.20106738972933],
            ["lat" => 51.460420940179034, "lng" => 18.193757254055413],
            ["lat" => 51.424656622418695, "lng" => 18.33115259201432],
            ["lat" => 51.83533022185753, "lng" => 18.44564904980956],
            ["lat" => 51.83859163102062, "lng" => 18.660168686502658],
            ["lat" => 52.06069793883887, "lng" => 18.72125066160737],
            ["lat" => 52.08756126578615, "lng" => 18.943680485176287],
            ["lat" => 52.196004912562444, "lng" => 18.911354561831047],
            ["lat" => 52.21770961366323, "lng" => 19.074039061022063],
            ["lat" => 52.375687909582666, "lng" => 18.933969679654496],
            ["lat" => 53.61397009450343, "lng" => 17.71215112741598],
            ["lat" => 53.66005678592293, "lng" => 16.8617029328731],
        ];


        $clubs = [
            [
                'name' => "Lech Poznań",
                'url_logo' => asset('lechpoznan.png'),
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

        DB::table('lechpoznan')->insert($clubs);
    }
}
