<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrukBetTermalicaNiecieczaSeeder extends Seeder
{
    public function run()
    {
        // No positive relationships mentioned
        $positiveClubs = ["Kibice Termalici Bruk-Bet Nieciecza"];

        $negativeClubs = ["Stal Mielec", "Sandencja Nowy Sącz", "Cracovia Kraków"];

        $clubs = [
            [
                'name' => "Termalica Bruk-Bet Nieciecza",
                'url_logo' => "https://i.imgur.com/bffzfpj.png",
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

        DB::table('brukbettermalicanieciecza')->insert($clubs);
    }
}
