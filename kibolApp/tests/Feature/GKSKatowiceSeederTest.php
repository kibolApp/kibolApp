<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Database\Seeders\GKSKatowiceSeeder as Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GKSKatowiceSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testItSeedsGKSKatowiceTableWithExpectedData()
    {
        $this->seed(Seeder::class);

        $this->assertDatabaseCount('GKSKatowice', count($this->getExpectedData()));
        $this->assertDatabaseHas('GKSKatowice', $this->getExpectedData()[0]);
    }

    public function getExpectedData(): array
    {
        $expectedData = [
            [
                'name' => "GKS Katowice",
                'url_logo' => "https://i.imgur.com/LaB5Fat.png",
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
        return ["Górnik Zabrze"];
    }

    public function getNegativeClubs(): array
    {
        return [
            "Ruch Chorzów", "Wisła Kraków", "Widzew Łódź", "Elana Toruń", "Zagłębie Sosnowiec",
            "Legia Warszawa", "GKS Tychy", "Polonia Bytom", "Piast Gliwice", "BKS Stal Bielsko-Biała",
            "GKS Jastrzębie", "Odra Wodzisław Śl.", "Odra Opole", "Górnik Wałbrzych", "ŁKS Łódź",
            "GKS Bełchatów", "Radomiak Radom", "Olimpia Elbląg", "Arka Gdynia", "Lechia Gdańsk",
            "KKS Kalisz", "Hutnik Kraków", "Sandecja Nowy Sącz", "Beskid Andrychów", "Stal Rzeszów",
            "Karpaty Krosno", "Stal Stalowa Wola", "Igloopol Dębica", "Czuwaj Przemyśl"
        ];
    }

    public function getAreaDatalat(): array
    {
        $coordinates = [
            ["lat" => 50.49516782332944, "lng" => 18.957171285334738],
            ["lat" => 50.29772729157466, "lng" => 18.970704842840263],
            ["lat" => 50.28644661280825, "lng" => 18.967195841851463],
            ["lat" => 50.197923552372544, "lng" => 18.981893466282486],
            ["lat" => 50.1924703913424, "lng" => 19.139506313572383],
            ["lat" => 50.28064593596247, "lng" => 19.10169607978264],
            ["lat" => 50.500935048533734, "lng" => 19.295292420936647],
            ["lat" => 50.49516782332944, "lng" => 18.957171285334738]
        ];

        return array_column($coordinates, 'lat');
    }
}
