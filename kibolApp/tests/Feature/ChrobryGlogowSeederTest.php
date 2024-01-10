<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Database\Seeders\ChrobryGlogowSeeder;

class ChrobryGlogowSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testChrobryGlogowSeeder()
    {
        $this->seed(ChrobryGlogowSeeder::class);

        $clubs = DB::table('chrobryglogow')->get();

        $this->assertCount(19, $clubs);

        $expectedPositiveClubs = ["Stilon Gorzów Wlkp."];
        $expectedNegativeClubs = [
            "Zagłębie Lubin", "Śląsk Wrocław", "Miedź Legnica", "Polonia Świdnica", "Falubaz Zielona Góra",
            "Promień Żary", "Stal Gorzów Wlkp.", "Dozamet Nowa Sól", "Karkonosze Jelenia Góra",
            "Górnik Polkowice", "Odra Wodzisław Śl.", "Ostrovia Ostrów Wlkp.", "Lech Poznań", "Gwardia Koszalin",
            "Flota Świnoujście", "Odra Opole", "Górnik Konin"
        ];

        foreach ($expectedPositiveClubs as $positiveClub) {
            $this->assertDatabaseHas('chrobryglogow', ['positive' => $positiveClub]);
        }

        foreach ($expectedNegativeClubs as $negativeClub) {
            $this->assertDatabaseHas('chrobryglogow', ['negative' => $negativeClub]);
        }
    }
}
