<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Database\Seeders\StalMielecSeeder;

class StalMielecSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testStalMielecSeeder()
    {
        $this->seed(StalMielecSeeder::class);

        $clubs = DB::table('stalmielec')->get();

        $this->assertCount(29, $clubs);

        $expectedPositiveClubs = ["Czarni Jasło", "Sandecja Nowy Sącz"];
        $expectedNegativeClubs = [
            "Siarka Tarnobrzeg", "Stal Stalowa Wola", "Wisłoka Dębica", "Igloopol Dębica", "Resovia Rzeszów",
            "Stal Rzeszów", "Karpaty Krosno", "JKS Jarosław", "Stal Sanok", "Polonia Przemyśl",
            "Wisła Kraków", "Unia Tarnów", "Zagłębie Sosnowiec", "Górnik Zabrze", "GKS Katowice",
            "GKS Jastrzębie", "ROW Rybnik", "Miedź Legnica", "Radomiak Radom", "Legia Warszawa",
            "Motor Lublin", "Górnik Łęczna", "Chełmianka Chełm", "Łada Biłgoraj", "Wisła Sandomierz",
            "Raków Częstochowa"
        ];

        foreach ($expectedPositiveClubs as $positiveClub) {
            $this->assertDatabaseHas('stalmielec', ['positive' => $positiveClub]);
        }

        foreach ($expectedNegativeClubs as $negativeClub) {
            $this->assertDatabaseHas('stalmielec', ['negative' => $negativeClub]);
        }
    }
}
