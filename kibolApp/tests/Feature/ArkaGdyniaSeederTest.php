<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Database\Seeders\ArkaGdyniaSeeder as Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArkaGdyniaSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testItSeedsArkaGdyniaTableWithExpectedData()
    {
        $this->seed(Seeder::class);

        $this->assertDatabaseCount('arkagdynia', count($this->getExpectedData()));
        $this->assertDatabaseHas('arkagdynia', $this->getExpectedData()[0]);
    }

    public function getExpectedData(): array
    {
        $expectedData = [
            [
                'name' => "Arka Gdynia",
                'url_logo' => "https://i.imgur.com/DIxQvf1.png",
                'positive' => null,
                'negative' => null,
                '$coordinates' => null,
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
        return [
            "Cracovia", "Lech Poznań", "Polonia Bytom", "Zagłębie Lubin", "KSZO Ostrowiec Św.", "Gwardia Koszalin"
        ];
    }

    public function getNegativeClubs(): array
    {
        return [
            "Lechia Gdańsk", "Śląsk Wrocław", "Motor Lublin", "Wisła Kraków", "Ruch Chorzów", "Widzew Łódź",
            "Elana Toruń", "Legia Warszawa", "Stomil Olsztyn", "Pogoń Szczecin", "Bałtyk Gdynia", "Jagiellonia Białystok",
            "Olimpia Elbląg", "Radomiak Radom", "Wisła Płock", "Korona Kielce", "Unia Tarnów", "Zagłębie Sosnowiec",
            "Górnik Zabrze", "GKS Katowice", "Piast Gliwice", "ROW Rybnik", "Raków Częstochowa", "Miedź Legnica",
            "Górnik Łęczna", "Hetman Zamość", "KKS Kalisz", "Jeziorak Iława", "Kotwica Kołobrzeg", "Gryf Słupsk",
            "Czarni Słupsk", "Chojniczanka Chojnice", "Bytovia Bytów", "KP Starogard Gdański", "Stal Stalowa Wola"
        ];
    }
}
