<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZniczPruszkowSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["GKLS Nadarzyn", "Ursus Warszawa", "Dolcan Ząbki"];

        $negativeClubs = [
            "Polonia Warszawa", "Wisła Płock", "GKS Katowice", "Stomil Olsztyn", "Motor Lublin"
        ];
        $coordinates = [
            ["lat" => 52.23284701692526, "lng" => 20.957970870287085],
            ["lat" => 52.202946148614444, "lng" => 20.83774071120112],
            ["lat" => 52.14774193204977, "lng" => 20.63038792627316],
            ["lat" => 52.05051171079458, "lng" => 20.719602257539236],
            ["lat" => 52.14043644025759, "lng" => 20.98890174434848],
            ["lat" => 52.23284701692526, "lng" => 20.957970870287085],
        ];


        $clubs = [
            [
                'name' => "Znicz Pruszków",
                'url_logo' => "https://i.imgur.com/zxyrE0u.png",
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

        DB::table('zniczpruszkow')->insert($clubs);
    }
}
