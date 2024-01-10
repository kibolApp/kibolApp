<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Database\Seeders\GKSKatowiceSeeder;

class GKSKatowiceSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testGKSKatowiceSeeder()
    {
        $this->seed(GKSKatowiceSeeder::class);

        $clubs = DB::table('gkskatowice')->get();

        $this->assertCount(31, $clubs);

        $expectedPositiveClubs = ["Górnik Zabrze"];
        $expectedNegativeClubs = [
            "Ruch Chorzów", "Wisła Kraków", "Widzew Łódź", "Elana Toruń", "Zagłębie Sosnowiec",
            "Legia Warszawa", "GKS Tychy", "Polonia Bytom", "Piast Gliwice", "BKS Stal Bielsko-Biała",
            "GKS Jastrzębie", "Odra Wodzisław Śl.", "Odra Opole", "Górnik Wałbrzych", "ŁKS Łódź",
            "GKS Bełchatów", "Radomiak Radom", "Olimpia Elbląg", "Arka Gdynia", "Lechia Gdańsk",
            "KKS Kalisz", "Hutnik Kraków", "Sandecja Nowy Sącz", "Beskid Andrychów", "Stal Rzeszów",
            "Karpaty Krosno", "Stal Stalowa Wola", "Igloopol Dębica", "Czuwaj Przemyśl"
        ];

        foreach ($expectedPositiveClubs as $positiveClub) {
            $this->assertDatabaseHas('gkskatowice', ['positive' => $positiveClub]);
        }

        foreach ($expectedNegativeClubs as $negativeClub) {
            $this->assertDatabaseHas('gkskatowice', ['negative' => $negativeClub]);
        }
    }
}
