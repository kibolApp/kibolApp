<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Database\Seeders\PoloniaWarszawaSeeder as Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PoloniaWarszawaSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testItSeedsPoloniaWarszawaTableWithExpectedData()
    {
        $this->seed(Seeder::class);

        $this->assertDatabaseCount('PoloniaWarszawa', count($this->getExpectedData()));
        $this->assertDatabaseHas('PoloniaWarszawa', $this->getExpectedData()[0]);
    }

    public function getExpectedData(): array
    {
        $expectedData = [
            [
                'name' => "Polonia Warszawa",
                'url_logo' => asset('poloniawarszawa.png'),
                'positive' => null,
                'negative' => null,
                'lat' => null,
                'lng' => null,
            ],
        ];

        return array_merge($expectedData, $this->getAdditionalData());
    }

    public function getAdditionalData(): array
    {
        $additionalData = [];

        foreach ($this->getPositiveClubs() as $club) {
            $additionalData[] = ['positive' => $club];
        }

        foreach ($this->getNegativeClubs() as $club) {
            $additionalData[] = ['negative' => $club];
        }

        foreach ($this->getAreaDatalat() as $club) {
            $additionalData[] = ['lat' => $club];
        }


        return $additionalData;
    }

    public function getPositiveClubs(): array
    {
        return [];
    }

    public function getNegativeClubs(): array
    {
        return [
            "Legia Warszawa", "Zagłębie Sosnowiec", "Olimpia Elbląg", "Radomiak Radom", "Hutnik Warszawa",
            "Olimpia Warszawa", "Ursus Warszawa", "Dolcan Ząbki", "Znicz Pruszków", "Świt Nowy Dwór Mazowiecki",
            "Legionovia Legionowo", "Pogoń Siedlce", "Wisła Płock", "Legia Chełmża", "Pogoń Szczecin",
            "Bałtyk Gdynia", "Jagiellonia Białystok", "Motor Lublin", "Hetman Zamość", "Wisła Puławy",
            "KSZO Ostrowiec Św.", "Unia Tarnów", "Ruch Chorzów", "GKS Katowice", "BKS Stal Bielsko-Biała",
            "Raków Częstochowa", "Gwardia Koszalin"
        ];
    }

    public function getAreaDatalat(): array
    {
        $coordinates = [
            ["lat" => 52.147285464629306, "lng" => 20.63063092773467],
            ["lat" => 52.20043099413979, "lng" => 20.831509719447297],
            ["lat" => 52.232854268718, "lng" => 20.95895204731832],
            ["lat" => 52.26412186260367, "lng" => 20.96369949243885],
            ["lat" => 52.2308816688101, "lng" => 21.024284392492547],
            ["lat" => 52.2276330237157, "lng" => 21.04486187708227],
            ["lat" => 52.304389456264715, "lng" => 21.15552563208493],
            ["lat" => 52.459079070696845, "lng" => 21.547890950054892],
            ["lat" => 52.65778034032817, "lng" => 22.448544740106456],
            ["lat" => 52.80067874677539, "lng" => 22.421581638098218],
            ["lat" => 52.89042550663413, "lng" => 22.273082449648314],
            ["lat" => 53.06962901749628, "lng" => 21.895103681832182],
            ["lat" => 53.12645627821391, "lng" => 21.732308282409974],
            ["lat" => 53.02392303468994, "lng" => 21.044013751033674],
            ["lat" => 52.805471776229695, "lng" => 20.855977063986415],
            ["lat" => 52.497739068419776, "lng" => 20.319068695152424],
            ["lat" => 52.147285464629306, "lng" => 20.63063092773467],
        ];

        return array_column($coordinates, 'lat');
    }
}
