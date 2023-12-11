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

        $clubs = [
            [
                'name' => "Znicz Pruszków",
                'url_logo' => "https://i.imgur.com/zxyrE0u.png",
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

        DB::table('zniczpruszkow')->insert($clubs);
    }
}