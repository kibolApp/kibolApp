<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Database\Seeders\LKSLodzSeeder as Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LKSLodzSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testItSeedsŁKSŁódźTableWithExpectedData()
    {
        $this->seed(Seeder::class);

        $this->assertDatabaseCount('LKSlodz', count($this->getExpectedData()));
        $this->assertDatabaseHas('LKSlodz', $this->getExpectedData()[0]);
    }

    public function getExpectedData(): array
    {
        $expectedData = [
            [
                'name' => "ŁKS Łódź",
                'url_logo' => "https://imgur.com/BJPSl4y.png",
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
        return ["Zawisza Bydgoszcz", "GKS Tychy", "Lech Poznań"];
    }

    public function getNegativeClubs(): array
    {
        return [
            "Widzew Łódź", "Ruch Chorzów", "Wisła Kraków", "Elana Toruń", "KKS Kalisz", "Stal Rzeszów",
            "Karpaty Krosno", "Stal Stalowa Wola", "Resovia Rzeszów", "Legia Warszawa", "Zagłębie Sosnowiec",
            "BKS Stal Bielsko-Biała", "Olimpia Elbląg", "Radomiak Radom", "Odra Opole", "Chrobry Głogów",
            "Śląsk Wrocław", "Motor Lublin", "Chełmianka Chełm", "Wisła Płock", "Polonia Warszawa",
            "Stomil Olsztyn", "Jagiellonia Białystok", "Pogoń Szczecin", "Polonia Bydgoszcz", "RKS Radomsko",
            "Ceramika Opoczno", "GKS Katowice", "KS Myszków", "Piast Gliwice"
        ];
    }

    public function getAreaDatalat(): array
    {
        $coordinates = [
            ["lat" => 51.769155891609614, "lng" => 19.449262480897346],
            ["lat" => 52.08960734860412, "lng" => 20.41588058438603],
            ["lat" => 52.2459196153317, "lng" => 19.223583637622852],
            ["lat" => 52.1928037376824, "lng" => 18.49143087784131],
            ["lat" => 51.17321381741908, "lng" => 18.108425851769482],
            ["lat" => 51.01473481107527, "lng" => 19.39286295290836],
            ["lat" => 51.769155891609614, "lng" => 19.449262480897346],
        ];

        return array_column($coordinates, 'lat');
    }
}
