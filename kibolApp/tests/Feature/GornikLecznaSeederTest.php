<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Database\Seeders\GornikLecznaSeeder as Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GornikLecznaSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testItSeedsGornikLecznaTableWithExpectedData()
    {
        $this->seed(Seeder::class);

        $this->assertDatabaseCount('gornikleczna', count($this->getExpectedData()));
        $this->assertDatabaseHas('gornikleczna', $this->getExpectedData()[0]);
    }

    public function getExpectedData(): array
    {
        $expectedData = [
            [
                'name' => "Górnik Łęczna",
                'url_logo' => "https://i.imgur.com/ViNJIKR.png",
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
        return ["Chełmianka Chełm"];
    }

    public function getNegativeClubs(): array
    {
        return [
            "Avia Świdnik", "Stal Stalowa Wola", "Łada Biłgoraj", "Tomasovia Tomaszów Lubelski",
            "Orlęta Radzyń Podlaski", "Orlęta Łuków", "Wisła Puławy", "Stal Rzeszów", "Karpaty Krosno",
            "Polonia Przemyśl", "Siarka Tarnobrzeg", "Stal Mielec", "Sokół Nisko", "Wisła Kraków",
            "Widzew Łódź", "Ruch Chorzów", "Elana Toruń", "GKS Jastrzębie", "Chemik Kędzierzyn-Koźle",
            "Korona Kielce", "Legia Warszawa", "Radomiak Radom", "Olimpia Elbląg", "Wisła Płock",
            "Pogoń Szczecin", "Arka Gdynia", "Lech Poznań"
        ];
    }
}
