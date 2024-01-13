<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WislaPlockSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Stomil Olsztyn"];

        $negativeClubs = [
            "Legia Warszawa", "Radomiak Radom", "Olimpia Elbląg", "Zagłębie Sosnowiec", "Górnik Zabrze",
            "Polonia Warszawa", "Zawisza Bydgoszcz", "Elana Toruń", "Arka Gdynia", "Pogoń Szczecin",
            "Gwardia Koszalin", "Zagłębie Lubin", "ŁKS Łódź", "Widzew Łódź", "Motor Lublin", "Górnik Łęczna",
            "Avia Świdnik", "Stal Stalowa Wola", "Wisła Kraków", "Sandecja Nowy Sącz", "Korona Kielce",
            "Hutnik Warszawa", "Ursus Warszawa", "Olimpia Warszawa", "Warszawianka Warszawa", "Dolcan Ząbki",
            "Świt Nowy Dwór Mazowiecki", "Legionovia Legionowo", "Znicz Pruszków", "Pogoń Siedlce"
        ];
        $coordinates = [
            ["lat" => 53.32176980722528, "lng" => 19.729510940703648],
            ["lat" => 53.23077193019495, "lng" => 19.693749063220764],
            ["lat" => 53.150750469847765, "lng" => 19.75261714279236],
            ["lat" => 53.10680451883536, "lng" => 19.623598288744574],
            ["lat" => 52.959966339170506, "lng" => 19.67809490779959],
            ["lat" => 52.985376271368835, "lng" => 19.559079505228283],
            ["lat" => 52.957727248978614, "lng" => 19.559533791394244],
            ["lat" => 52.943080459620916, "lng" => 19.43672932354798],
            ["lat" => 52.830572709230125, "lng" => 19.42155766540344],
            ["lat" => 52.600732416166665, "lng" => 19.358232991359046],
            ["lat" => 52.25199014302936, "lng" => 19.20299641034066],
            ["lat" => 52.00550787865021, "lng" => 19.931149344437017],
            ["lat" => 52.14816947199424, "lng" => 20.630613857144084],
            ["lat" => 52.500361026817274, "lng" => 20.315749238409666],
            ["lat" => 52.79831608128174, "lng" => 20.84178710451056],
            ["lat" => 53.02429416976565, "lng" => 21.04562822351531],
            ["lat" => 53.12856773610801, "lng" => 21.742639188900313],
            ["lat" => 53.487527996799, "lng" => 21.59655193071805],
            ["lat" => 53.47804506964778, "lng" => 21.437446441523775],
            ["lat" => 53.17922481059554, "lng" => 20.220058725391993],
            ["lat" => 53.32176980722528, "lng" => 19.729510940703648],
        ];


        $clubs = [
            [
                'name' => "Wisła Płock",
                'url_logo' => asset('wislaplock.png'),
                'positive' => null,
                'negative' => null,
                'lat'=>null,
                'lng'=>null,
            ],
        ];

        foreach ($coordinates as $coordinate) {
            $clubs[]=[
                'name' => null,
                'url_logo' => null,
                'positive' => null,
                'negative' => null,
                'lat' => $coordinate['lat'],
                'lng' => $coordinate['lng'],
            ];
        };

        foreach ($positiveClubs as $club) {
            $clubs[] = ['name' => null, 'url_logo' => null, 'positive' => $club, 'negative' => null, 'lat'=>null,
            'lng'=>null,];
        }

        foreach ($negativeClubs as $club) {
            $clubs[] = ['name' => null, 'url_logo' => null, 'positive' => null, 'negative' => $club, 'lat'=>null,
            'lng'=>null,];
        }

        DB::table('wislaplock')->insert($clubs);
    }
}
