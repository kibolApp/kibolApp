<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Database\Seeders\WislaPlockSeeder;

class WislaPlockSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testWislaPlockSeeder()
    {
        $this->seed(WislaPlockSeeder::class);

        $clubs = DB::table('wislaplock')->get();

        $this->assertCount(32, $clubs);

        $expectedPositiveClubs = ["Stomil Olsztyn"];
        $expectedNegativeClubs = [
            "Legia Warszawa", "Radomiak Radom", "Olimpia Elbląg", "Zagłębie Sosnowiec", "Górnik Zabrze",
            "Polonia Warszawa", "Zawisza Bydgoszcz", "Elana Toruń", "Arka Gdynia", "Pogoń Szczecin",
            "Gwardia Koszalin", "Zagłębie Lubin", "ŁKS Łódź", "Widzew Łódź", "Motor Lublin", "Górnik Łęczna",
            "Avia Świdnik", "Stal Stalowa Wola", "Wisła Kraków", "Sandecja Nowy Sącz", "Korona Kielce",
            "Hutnik Warszawa", "Ursus Warszawa", "Olimpia Warszawa", "Warszawianka Warszawa", "Dolcan Ząbki",
            "Świt Nowy Dwór Mazowiecki", "Legionovia Legionowo", "Znicz Pruszków", "Pogoń Siedlce"
        ];

        foreach ($expectedPositiveClubs as $positiveClub) {
            $this->assertDatabaseHas('wislaplock', ['positive' => $positiveClub]);
        }

        foreach ($expectedNegativeClubs as $negativeClub) {
            $this->assertDatabaseHas('wislaplock', ['negative' => $negativeClub]);
        }
    }
}
