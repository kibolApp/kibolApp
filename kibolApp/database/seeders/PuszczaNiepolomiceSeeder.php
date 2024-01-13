<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PuszczaNiepolomiceSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Garbarnia Kraków"];
        $negativeClubs = ["Wisła Kraków", "Ruch Chorzów", "Widzew Łódź", "Elana Toruń"];
        $coordinates = [
            ["lat" => 49.30541490434811, "lng" => 19.806897160335637],
            ["lat" => 49.27905284549465, "lng" => 19.819823021860884],
            ["lat" => 49.21566744305633, "lng" => 19.764615124338206],
            ["lat" => 49.20611493273975, "lng" => 19.814315603700038],
            ["lat" => 49.21208478817283, "lng" => 19.8952921963608],
            ["lat" => 49.237175059371, "lng" => 19.928502057183408],
            ["lat" => 49.20014662193009, "lng" => 20.035084870306292],
            ["lat" => 49.181058401487974, "lng" => 20.091954545907925],
            ["lat" => 49.25032847221729, "lng" => 20.1017554804518],
            ["lat" => 49.31740759373969, "lng" => 20.139276802755347],
            ["lat" => 49.35582598493477, "lng" => 20.219160203172322],
            ["lat" => 49.34501437225512, "lng" => 20.320676740957623],
            ["lat" => 49.4003267557479, "lng" => 20.32524966497263],
            ["lat" => 49.40514276510331, "lng" => 20.388285209545245],
            ["lat" => 49.40995977350019, "lng" => 20.438375850669985],
            ["lat" => 49.38687889282366, "lng" => 20.566508884349616],
            ["lat" => 50.04461569502834, "lng" => 20.886603865628558],
            ["lat" => 50.198221113738015, "lng" => 20.99822070251406],
            ["lat" => 50.28521967849818, "lng" => 20.78987881287901],
            ["lat" => 50.421508840885565, "lng" => 20.28950936485208],
            ["lat" => 50.198221113738015, "lng" => 20.420416465283864],
            ["lat" => 49.979432125407186, "lng" => 20.392754051011423],
            ["lat" => 49.50726848437304, "lng" => 20.340402201339117],
            ["lat" => 49.41607374288435, "lng" => 20.118627472292218],
            ["lat" => 49.348061663184154, "lng" => 19.794729231095374],
            ["lat" => 49.29690875585669, "lng" => 19.794415858098745],
            ["lat" => 49.295630441984, "lng" => 19.807916118893758],
            ["lat" => 49.30541490434811, "lng" => 19.806897160335637],
        ];
        

        $clubs = [
            [
                'name' => "Puszcza Niepołomice",
                'url_logo' => "https://i.imgur.com/ZENnGmA.png",
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
        DB::table('puszczaniepolomice')->insert($clubs);
    }
}
