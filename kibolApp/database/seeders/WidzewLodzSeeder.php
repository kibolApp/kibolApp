<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WidzewLodzSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Kibice Widzewa"];
        
        $negativeClubs = ["Cała Polska"];

        $clubs = [
            [
                'name' => "Widzew Łódź",
                'url_logo' => "https://i.imgur.com/Gy7xBj9.png",
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

        DB::table('widzewlodz')->insert($clubs);
    }
}
