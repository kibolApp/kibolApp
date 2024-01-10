<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Database\Seeders\SlaskWroclawSeeder;

class SlaskWroclawSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testSlaskWroclawSeeder()
    {
        $this->seed(SlaskWroclawSeeder::class);

        $clubs = DB::table('slaskwroclaw')->get();

        $this->assertCount(38, $clubs);

        $expectedPositiveClubs = ["Lechia Gdańsk", "Motor Lublin", "Miedź Legnica"];
        $expectedNegativeClubs = [
            "Zagłębie Lubin", "Ruch Chorzów", "Wisła Kraków", "Elana Toruń", "Widzew Łódź", "Cracovia",
            "Arka Gdynia", "Lech Poznań", "Legia Warszawa", "Odra Opole", "Górnik Zabrze", "Polonia Bytom",
            "GKS Tychy", "GKS Jastrzębie", "Górnik Wałbrzych", "Chrobry Głogów", "BKS Bolesławiec",
            "Polonia Świdnica", "Lechia Dzierżoniów", "KKS Kalisz", "Zawisza Bydgoszcz", "Pogoń Szczecin",
            "Olimpia Elbląg", "Jagiellonia Białystok", "ROW Rybnik", "Radomiak Radom", "Sandecja Nowy Sącz",
            "Stal Rzeszów", "Stal Stalowa Wola", "Avia Świdnik", "Sevilla FC", "CSKA Moskwa",
            "Banik Ostrava", "Borussia Dortmund"
        ];

        foreach ($expectedPositiveClubs as $positiveClub) {
            $this->assertDatabaseHas('slaskwroclaw', ['positive' => $positiveClub]);
        }

        foreach ($expectedNegativeClubs as $negativeClub) {
            $this->assertDatabaseHas('slaskwroclaw', ['negative' => $negativeClub]);
        }
    }
}
