<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LechiaGdanskSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Śląsk Wrocław", "Gryf Słupsk"];
        $negativeClubs = ["Arka Gdynia", "Cracovia Kraków", "Lech Poznań", "Pogoń Szczecin", "Zawisza Bydgoszcz"];

        $clubs = [
            [
                'name' => "Lechia Gdańsk",
                'url_logo' => "https://i.imgur.com/IQnXfez.png",
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

        DB::table('lechiagdansk')->insert($clubs);
    }
}
