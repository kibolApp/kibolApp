<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Database\Seeders\JagielloniaBialystokSeeder as Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JagielloniaBialystokSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testItSeedsJagielloniaBialystokTableWithExpectedData()
    {
        $this->seed(Seeder::class);

        $this->assertDatabaseCount('JagielloniaBialystok', count($this->getExpectedData()));
        $this->assertDatabaseHas('JagielloniaBialystok', $this->getExpectedData()[0]);
    }

    public function getExpectedData(): array
    {
        $expectedData = [
            [
                'name' => "Jagiellonia Białystok",
                'url_logo' => "https://i.imgur.com/HpUwEAe.png",
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
        return ["Mazur Ełk"];
    }

    public function getNegativeClubs(): array
    {
        return [
            "Legia Warszawa", "Cracovia", "ŁKS Łomża", "Wigry Suwałki", "Stomil Olsztyn",
            "Olimpia Elbląg", "Arka Gdynia", "Pogoń Szczecin", "Zawisza Bydgoszcz", "Lech Poznań",
            "Radomiak Radom", "Śląsk Wrocław", "Korona Kielce", "Wisła Kraków", "Zagłębie Sosnowiec",
            "Górnik Zabrze", "Stal Stalowa Wola", "Resovia Rzeszów", "Polonia Warszawa", "Granica Kętrzyn",
            "Sparta Szepietowo", "Hetman Białystok"
        ];
    }

    public function getAreaDatalat(): array
    {
        $coordinates = [
            ["lat" => 53.489560758466126, "lng" => 21.59190046986336],
            ["lat" => 53.11825093638768, "lng" => 21.744271018725158],
            ["lat" => 53.070228862850854, "lng" => 21.90162190069057],
            ["lat" => 52.968001427955755, "lng" => 21.944162513037867],
            ["lat" => 52.860324210562226, "lng" => 22.106503370749977],
            ["lat" => 52.8904794889319, "lng" => 22.27165626391576],
            ["lat" => 52.756033449603365, "lng" => 22.29973893993173],
            ["lat" => 52.802517342195245, "lng" => 22.421541815438843],
            ["lat" => 52.641245260761934, "lng" => 22.454396158491875],
            ["lat" => 52.57529114756099, "lng" => 22.47431684419911],
            ["lat" => 52.52786296081294, "lng" => 22.522975312068212],
            ["lat" => 52.40907546725808, "lng" => 22.566278497574785],
            ["lat" => 52.38456601864749, "lng" => 22.739383512816744],
            ["lat" => 52.37610264863653, "lng" => 22.91546535914486],
            ["lat" => 52.328588052640896, "lng" => 23.04680837639509],
            ["lat" => 52.29557611649756, "lng" => 23.072146971778295],
            ["lat" => 52.28890513069956, "lng" => 23.176237698511073],
            ["lat" => 52.496127010618636, "lng" => 23.352734586992995],
            ["lat" => 52.61068031479053, "lng" => 23.631492775179595],
            ["lat" => 52.61995569216535, "lng" => 23.74019125111272],
            ["lat" => 52.71109710511857, "lng" => 23.927229702752015],
            ["lat" => 52.94045524111144, "lng" => 23.905669380160276],
            ["lat" => 52.97883956100702, "lng" => 23.93264105141745],
            ["lat" => 53.07722843839781, "lng" => 23.858668027199855],
            ["lat" => 53.16089391205753, "lng" => 23.892084347069698],
            ["lat" => 53.453800523433586, "lng" => 23.687635985816144],
            ["lat" => 53.753050424460895, "lng" => 23.552581124736577],
            ["lat" => 53.85203585285123, "lng" => 23.536527511624655],
            ["lat" => 54.00165125612688, "lng" => 23.464550435092036],
            ["lat" => 54.04470134247009, "lng" => 23.525615530779106],
            ["lat" => 54.17943551947096, "lng" => 23.46261410237679],
            ["lat" => 54.2268356323755, "lng" => 23.365622187750205],
            ["lat" => 54.26004458492736, "lng" => 23.250081823129392],
            ["lat" => 54.29754785895889, "lng" => 23.133458311801945],
            ["lat" => 54.310875674745716, "lng" => 23.034605557355405],
            ["lat" => 54.35006835719685, "lng" => 23.04139181563545],
            ["lat" => 54.358873397151626, "lng" => 22.99146478623001],
            ["lat" => 54.393910036943566, "lng" => 22.99897032432878],
            ["lat" => 54.40766906454266, "lng" => 22.851117449278178],
            ["lat" => 54.36869170687834, "lng" => 22.79608356799747],
            ["lat" => 54.253047576469214, "lng" => 22.486666287799352],
            ["lat" => 53.81169825345577, "lng" => 22.69607164350154],
            ["lat" => 53.489560758466126, "lng" => 21.59190046986336],
        ];

        return array_column($coordinates, 'lat');
    }
}
