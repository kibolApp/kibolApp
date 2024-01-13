<?php

namespace Tests\Feature\Seeders;

use Tests\TestCase;
use Database\Seeders\MiedzLegnicaSeeder as Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MiedzLegnicaSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testItSeedsMiedzLegnicaTableWithExpectedData()
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
                'url_logo' => asset('miedzlegnica.png'),
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

    public function getAreaDatalat(): array
    {
        $coordinates = [
            ['lat' => 51.43058279985263, 'lng' => 16.764053638002707],
            ['lat' => 51.316852677165, 'lng' => 16.062588607537464],
            ['lat' => 51.29251902511578, 'lng' => 15.622685789194179],
            ['lat' => 51.168295391201866, 'lng' => 15.00744328221424],
            ['lat' => 51.16327301965441, 'lng' => 14.993378563123457],
            ['lat' => 51.15067557973444, 'lng' => 15.001136147409312],
            ['lat' => 50.92481562880877, 'lng' => 14.866300863938164],
            ['lat' => 50.87579712448823, 'lng' => 14.825085077865339],
            ['lat' => 50.872028359013484, 'lng' => 14.91496352937628],
            ['lat' => 50.872028359013484, 'lng' => 14.99879661557469],
            ['lat' => 50.979543909162004, 'lng' => 15.009540784337958],
            ['lat' => 51.000317752067474, 'lng' => 14.973280593357913],
            ['lat' => 51.021099756985336, 'lng' => 15.009063844801062],
            ['lat' => 51.01543112800729, 'lng' => 15.093205547516192],
            ['lat' => 50.99087408438126, 'lng' => 15.135463081242506],
            ['lat' => 51.02487918024369, 'lng' => 15.174202516000463],
            ['lat' => 50.98332036441661, 'lng' => 15.183543074715828],
            ['lat' => 51.000317752067474, 'lng' => 15.23443879884502],
            ['lat' => 50.974844094639025, 'lng' => 15.278926047527307],
            ['lat' => 50.92759505399502, 'lng' => 15.2645240092682],
            ['lat' => 50.85019801978618, 'lng' => 15.35836621388998],
            ['lat' => 50.77856557126782, 'lng' => 15.380089075447984],
            ['lat' => 50.80682988609283, 'lng' => 15.436644283228162],
            ['lat' => 50.73525647227311, 'lng' => 15.6942872496289],
            ['lat' => 50.75031645406236, 'lng' => 15.813780090759224],
            ['lat' => 50.66754004778622, 'lng' => 15.864656544386577],
            ['lat' => 50.69574458687245, 'lng' => 15.97808792893241],
            ['lat' => 50.64122952187694, 'lng' => 16.007829068160277],
            ['lat' => 50.59803382376373, 'lng' => 16.019656924324778],
            ['lat' => 50.66002140388838, 'lng' => 16.106323022700423],
            ['lat' => 50.62995763450729, 'lng' => 16.210557649060405],
            ['lat' => 50.66754004778622, 'lng' => 16.22272662161629],
            ['lat' => 50.66754004778622, 'lng' => 16.330147644785058],
            ['lat' => 50.58301760756069, 'lng' => 16.448572574328324],
            ['lat' => 50.526745290611814, 'lng' => 16.39737066746028],
            ['lat' => 50.421866239721595, 'lng' => 16.194423510298833],
            ['lat' => 50.40316012013895, 'lng' => 16.654356907197666],
            ['lat' => 51.43058279985263, 'lng' => 16.764053638002707]
        ];

        return array_column($coordinates, 'lat');
    }
}
