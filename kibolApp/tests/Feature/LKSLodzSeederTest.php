<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Database\Seeders\LKSLodzSeeder;

class LKSLodzSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testLKSLodzSeeder()
    {
        $this->seed(LKSLodzSeeder::class);

        $clubs = DB::table('lkslodz')->get();

        $this->assertCount(34, $clubs);

        $expectedPositiveClubs = ["Zawisza Bydgoszcz", "GKS Tychy", "Lech Poznań"];
        $expectedNegativeClubs = [
            "Widzew Łódź", "Ruch Chorzów", "Wisła Kraków", "Elana Toruń", "KKS Kalisz", "Stal Rzeszów",
            "Karpaty Krosno", "Stal Stalowa Wola", "Resovia Rzeszów", "Legia Warszawa", "Zagłębie Sosnowiec",
            "BKS Stal Bielsko-Biała", "Olimpia Elbląg", "Radomiak Radom", "Odra Opole", "Chrobry Głogów",
            "Śląsk Wrocław", "Motor Lublin", "Chełmianka Chełm", "Wisła Płock", "Polonia Warszawa",
            "Stomil Olsztyn", "Jagiellonia Białystok", "Pogoń Szczecin", "Polonia Bydgoszcz", "RKS Radomsko",
            "Ceramika Opoczno", "GKS Katowice", "KS Myszków", "Piast Gliwice"
        ];

        foreach ($expectedPositiveClubs as $positiveClub) {
            $this->assertDatabaseHas('lkslodz', ['positive' => $positiveClub]);
        }

        foreach ($expectedNegativeClubs as $negativeClub) {
            $this->assertDatabaseHas('lkslodz', ['negative' => $negativeClub]);
        }
    }
}
