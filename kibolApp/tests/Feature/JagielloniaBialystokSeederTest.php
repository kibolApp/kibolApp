<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Database\Seeders\JagielloniaBialystokSeeder;

class JagielloniaBialystokSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testJagielloniaBialystokSeeder()
    {
        $this->seed(JagielloniaBialystokSeeder::class);

        $clubs = DB::table('jagielloniabialystok')->get();

        $this->assertCount(24, $clubs);

        $expectedPositiveClubs = ["Mazur Ełk"];
        $expectedNegativeClubs = [
            "Legia Warszawa", "Cracovia", "ŁKS Łomża", "Wigry Suwałki", "Stomil Olsztyn",
            "Olimpia Elbląg", "Arka Gdynia", "Pogoń Szczecin", "Zawisza Bydgoszcz", "Lech Poznań",
            "Radomiak Radom", "Śląsk Wrocław", "Korona Kielce", "Wisła Kraków", "Zagłębie Sosnowiec",
            "Górnik Zabrze", "Stal Stalowa Wola", "Resovia Rzeszów", "Polonia Warszawa", "Granica Kętrzyn",
            "Sparta Szepietowo", "Hetman Białystok"
        ];

        foreach ($expectedPositiveClubs as $positiveClub) {
            $this->assertDatabaseHas('jagielloniabialystok', ['positive' => $positiveClub]);
        }

        foreach ($expectedNegativeClubs as $negativeClub) {
            $this->assertDatabaseHas('jagielloniabialystok', ['negative' => $negativeClub]);
        }
    }
}
