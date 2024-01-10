<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Database\Seeders\ZaglebieLubinSeeder as ZaglembieSeeder;

class ZaglebieLubinSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testZaglebieLubinSeeder()
    {
        $this->seed(ZaglembieSeeder::class);

        $clubs = DB::table('zaglebielubin')->get();

        $this->assertCount(29, $clubs);

        $expectedPositiveClubs = ["Arka Gdynia", "Odra Opole", "Zawisza Bydgoszcz"];
        $expectedNegativeClubs = [
            "Śląsk Wrocław", "Chrobry Głogów", "Miedź Legnica", "Wisła Kraków", "Ruch Chorzów",
            "Widzew Łódź", "Elana Toruń", "Legia Warszawa", "Zagłębie Sosnowiec", "Raków Częstochowa",
            "BKS Stal Bielsko-Biała", "Chemik Kędzierzyn-Koźle", "Start Namysłów", "Stal Gorzów Wlkp.",
            "Stilon Gorzów Wlkp.", "Flota Świnoujście", "Lechia Gdańsk", "Stal Brzeg", "Moto-Jelcz Oława",
            "Piast Nowa Ruda", "Karkonosze Jelenia Góra", "Bielewianka Bielawa", "Lechia Dzierżoniów",
            "Zagłębie Wałbrzych", "Czuwaj Przemyśl"
        ];

        foreach ($expectedPositiveClubs as $positiveClub) {
            $this->assertDatabaseHas('zaglebielubin', ['positive' => $positiveClub]);
        }

        foreach ($expectedNegativeClubs as $negativeClub) {
            $this->assertDatabaseHas('zaglebielubin', ['negative' => $negativeClub]);
        }
    }
}
