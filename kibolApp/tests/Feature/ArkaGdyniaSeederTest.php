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

        $this->assertDatabaseCount('ArkaGdynia', count($this->getExpectedData()));
        $this->assertDatabaseHas('ArkaGdynia', $this->getExpectedData()[0]);
    }

    public function getExpectedData(): array
    {
        $expectedData = [
            [
                'name' => "Arka Gdynia",
                'url_logo' => "https://i.imgur.com/DIxQvf1.png",
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
        return ["Cracovia", "Lech Poznań", "Polonia Bytom", "Zagłębie Lubin", "KSZO Ostrowiec Św.", "Gwardia Koszalin"];
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

    public function getAreaDatalat(): array
    {
        $coordinates = [
            ["lat" => 54.48139824660586, "lng" => 18.53556849612343],
            ["lat" => 54.72663787934056, "lng" => 19.162572874169854],
            ["lat" => 54.90984164913908, "lng" => 18.197811673913066],
            ["lat" => 54.669758482172426, "lng" => 16.730340254108427],
            ["lat" => 54.447854902785735, "lng" => 16.350149768800804],
            ["lat" => 54.30222075020012, "lng" => 16.20098984609541],
            ["lat" => 54.41222320182757, "lng" => 16.761803365011417],
            ["lat" => 54.24146877292418, "lng" => 16.788163267589823],
            ["lat" => 54.48139824660586, "lng" => 18.53556849612343]
        ];

        return array_column($coordinates, 'lat');
    }
}
