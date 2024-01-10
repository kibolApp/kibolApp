<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Database\Seeders\MiedzLegnicaSeeder as Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MiedzLegnicaSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testItSeedsMiedzLegnicaTableWithExpectedata()
    {
        $this->seed(Seeder::class);

        $this->assertDatabaseCount('miedzlegnica', count($this->getExpectedData()));
        $this->assertDatabaseHas('miedzlegnica', $this->getExpectedData()[0]);
    }


    public function getExpectedData(): array
    {
        $expectedData = [
            [
                'name' => "Miedz Legnica",
                'url_logo' => "https://i.imgur.com/AJ27Q2w.png",
                'positive' => null,
                'negative' => null,
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

        return $additionalData;
    }

    public function getPositiveClubs(): array
    {
        return ["WKS Śląsk Wrocław", "Lechia Gdańsk", "Płomień Żary"];
    }

    public function getNegativeClubs(): array
    {
        return [
            'BKS Stal Bielsko-Biała', 'Arka Gdynia', 'BKS Bolesławiec', 'Chrobry Głogów', 'Cracovia Kraków',
            'GKS Katowice', 'GKS Tychy', 'Górnik Polkowice', 'Górnik Wałbrzych', 'Górnik Zabrze', 'Lech Poznań',
            'Legia Warszawa', 'Motor Lublin', 'Odra Opole', 'Podbeskidzie Bielsko-Biała', 'Polonia Świdnica',
            'Pogoń Szczecin', 'Radomiak Radom', 'Ruch Chorzów', 'Sandecja Nowy Sącz', 'Stal Rzeszów',
            'Stal Stalowa Wola', 'Widzew Łódź', 'Wisła Kraków', 'Zawisza Bydgoszcz', 'Zagłębie Lubin'
        ];
    }
}
