<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Database\Seeders\StalMielecSeeder as Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StalMielecSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testItSeedsStalMielecTableWithExpectedData()
    {
        $this->seed(Seeder::class);

        $this->assertDatabaseCount('StalMielec', count($this->getExpectedData()));
        $this->assertDatabaseHas('StalMielec', $this->getExpectedData()[0]);
    }

    public function getExpectedData(): array
    {
        $expectedData = [
            [
                'name' => "Stal Mielec",
                'url_logo' => "https://i.imgur.com/Vhi20Rx.png",
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
        return ["Czarni Jasło", "Sandecja Nowy Sącz"];
    }

    public function getNegativeClubs(): array
    {
        return [
            "Siarka Tarnobrzeg", "Stal Stalowa Wola", "Wisłoka Dębica", "Igloopol Dębica", "Resovia Rzeszów",
            "Stal Rzeszów", "Karpaty Krosno", "JKS Jarosław", "Stal Sanok", "Polonia Przemyśl",
            "Wisła Kraków", "Unia Tarnów", "Zagłębie Sosnowiec", "Górnik Zabrze", "GKS Katowice",
            "GKS Jastrzębie", "ROW Rybnik", "Miedź Legnica", "Radomiak Radom", "Legia Warszawa",
            "Motor Lublin", "Górnik Łęczna", "Chełmianka Chełm", "Łada Biłgoraj", "Wisła Sandomierz",
            "Raków Częstochowa"
        ];
    }

    public function getAreaDatalat(): array
    {
        $coordinates = [
            ["lat" => 50.329198962062236, "lng" => 21.054519525460904],
            ["lat" => 49.854804860480385, "lng" => 21.030311499127208],
            ["lat" => 49.345873673666404, "lng" => 21.001632917866885],
            ["lat" => 49.3652512462119, "lng" => 21.04167928218277],
            ["lat" => 49.36355062765455, "lng" => 21.05550706052111],
            ["lat" => 49.36652700989822, "lng" => 21.06340815642497],
            ["lat" => 49.358876280538084, "lng" => 21.0765667239302],
            ["lat" => 49.3652512462119, "lng" => 21.082502383800175],
            ["lat" => 49.3652512462119, "lng" => 21.092378940643385],
            ["lat" => 49.37589046887612, "lng" => 21.10229608298772],
            ["lat" => 49.38398823943183, "lng" => 21.090455316259607],
            ["lat" => 49.39423180122202, "lng" => 21.068699019925077],
            ["lat" => 49.404491919563725, "lng" => 21.06540375117001],
            ["lat" => 49.416483036133656, "lng" => 21.048212518732015],
            ["lat" => 49.421629016800125, "lng" => 21.05350135835326],
            ["lat" => 49.428496805067624, "lng" => 21.095213230524678],
            ["lat" => 49.42377440456076, "lng" => 21.11373070259279],
            ["lat" => 49.43580195761248, "lng" => 21.121739615163364],
            ["lat" => 49.42720853012915, "lng" => 21.15413383210634],
            ["lat" => 49.42034213130151, "lng" => 21.156061159651927],
            ["lat" => 49.41048465025435, "lng" => 21.178453771505417],
            ["lat" => 49.403208497981495, "lng" => 21.18101951238745],
            ["lat" => 49.404491919563725, "lng" => 21.201516343847885],
            ["lat" => 49.40278074839992, "lng" => 21.210083061205694],
            ["lat" => 49.41605439228633, "lng" => 21.2261348906369],
            ["lat" => 49.42634982500235, "lng" => 21.22297718660417],
            ["lat" => 49.437091972473524, "lng" => 21.235060904143523],
            ["lat" => 49.43408234411109, "lng" => 21.24296378432979],
            ["lat" => 49.44828305472524, "lng" => 21.26442100802413],
            ["lat" => 49.460788631287954, "lng" => 21.271288667442803],
            ["lat" => 49.44842616345775, "lng" => 21.30741872585969],
            ["lat" => 49.45056972616803, "lng" => 21.342501491464162],
            ["lat" => 49.43344143290449, "lng" => 21.374094430910986],
            ["lat" => 49.43386907792254, "lng" => 21.397887204064432],
            ["lat" => 49.41209583891981, "lng" => 21.43653360915164],
            ["lat" => 49.416359215428145, "lng" => 21.457052853183598],
            ["lat" => 49.41465352078987, "lng" => 21.477472618711857],
            ["lat" => 49.427884667177636, "lng" => 21.488955044952377],
            ["lat" => 49.41891861792777, "lng" => 21.5158297276883],
            ["lat" => 49.41891861792777, "lng" => 21.521768941012766],
            ["lat" => 49.435152185790315, "lng" => 21.528093492786212],
            ["lat" => 49.4330138166832, "lng" => 21.549186430447435],
            ["lat" => 49.44341795443114, "lng" => 21.628844025204955],
            ["lat" => 49.41422346045465, "lng" => 21.68108503136841],
            ["lat" => 49.408763829821055, "lng" => 21.72731776240613],
            ["lat" => 49.35694996467771, "lng" => 21.77901593174164],
            ["lat" => 49.39102732063586, "lng" => 21.830131617588023],
            ["lat" => 50.52519132874937, "lng" => 21.603064979252622],
            ["lat" => 50.49600098083758, "lng" => 21.421880756114717],
            ["lat" => 50.329198962062236, "lng" => 21.054519525460904],
        ];

        return array_column($coordinates, 'lat');
    }
}
