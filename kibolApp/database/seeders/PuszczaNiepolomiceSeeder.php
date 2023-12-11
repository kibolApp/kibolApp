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

        $clubs = [
            [
                'name' => "Puszcza Niepołomice",
                'url_logo' => "https://i.imgur.com/ZENnGmA.png",
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

        DB::table('puszczaniepolomice')->insert($clubs);
    }
}
