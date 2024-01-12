<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PiastGliwiceSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = [
            "GKS Jastrzębie"
        ];

        $negativeClubs = [
            "Górnik Zabrze", "GKS Katowice", "Zagłębie Sosnowiec", "ROW Rybnik", "Odra Wodzisław Śl.", 
            "Polonia Bytom", "Cracovia", "Legia Warszawa", "Odra Opole", "Śląsk Wrocław", "ŁKS Łódź", 
            "Lech Poznań", "Arka Gdynia", "Pogoń Szczecin", "Sandecja Nowy Sącz", "Wisłoka Dębica"
        ];
        $coordinates = [
            ["lat" => 50.29014162420185, "lng" => 18.71518319540982],
            ["lat" => 50.302396191746226, "lng" => 18.727367460992127],
            ["lat" => 50.32246283046479, "lng" => 18.72721144667284],
            ["lat" => 50.3560407041025, "lng" => 18.722602655331855],
            ["lat" => 50.37042008381687, "lng" => 18.73636412091571],
            ["lat" => 50.37600592027712, "lng" => 18.778618832947274],
            ["lat" => 50.38982807922778, "lng" => 18.83030304143881],
            ["lat" => 50.49246590587029, "lng" => 18.816929544495054],
            ["lat" => 50.48034620679189, "lng" => 18.078941422445695],
            ["lat" => 50.06587833815672, "lng" => 18.034991055570117],
            ["lat" => 50.05997933892721, "lng" => 18.059244624067816],
            ["lat" => 50.04826409105195, "lng" => 18.068272426000988],
            ["lat" => 50.045301585680875, "lng" => 18.08682475154683],
            ["lat" => 50.03323085407345, "lng" => 18.08621242655755],
            ["lat" => 50.02340824841687, "lng" => 18.10286317538433],
            ["lat" => 50.013393272219446, "lng" => 18.094894110514787],
            ["lat" => 49.99397995843134, "lng" => 18.118127726394164],
            ["lat" => 49.99708926081556, "lng" => 18.13232546551629],
            ["lat" => 49.98303447737621, "lng" => 18.155902890037453],
            ["lat" => 49.98993147581973, "lng" => 18.17128039218065],
            ["lat" => 49.99906641840829, "lng" => 18.16740776705538],
            ["lat" => 50.00055002448744, "lng" => 18.18322113977152],
            ["lat" => 49.99560712998459, "lng" => 18.19517049600134],
            ["lat" => 49.99733634405291, "lng" => 18.205199094752714],
            ["lat" => 49.97197865882541, "lng" => 18.21471211999466],
            ["lat" => 49.9685462509799, "lng" => 18.221988591732412],
            ["lat" => 49.97083220668512, "lng" => 18.237293714246817],
            ["lat" => 49.968853888257854, "lng" => 18.25502488785594],
            ["lat" => 49.96514757056656, "lng" => 18.275428838737298],
            ["lat" => 49.93981219804965, "lng" => 18.281228895321192],
            ["lat" => 49.92916024307081, "lng" => 18.292062030110856],
            ["lat" => 49.92952719985149, "lng" => 18.301228671904028],
            ["lat" => 49.92402548438841, "lng" => 18.300619310335634],
            ["lat" => 49.91633256197687, "lng" => 18.3194441652428],
            ["lat" => 49.9287933114083, "lng" => 18.331006201537576],
            ["lat" => 49.92989418175239, "lng" => 18.345909910445897],
            ["lat" => 49.950216899358, "lng" => 18.375505493591618],
            ["lat" => 49.93492136214135, "lng" => 18.434032166448475],
            ["lat" => 49.9020121804096, "lng" => 18.530793761911127],
            ["lat" => 49.92668958022463, "lng" => 18.547401994881028],
            ["lat" => 49.91375996723596, "lng" => 18.700882727404974],
            ["lat" => 49.90788531136917, "lng" => 18.737371254138793],
            ["lat" => 50.29014162420185, "lng" => 18.71518319540982],
        ];
        

        $clubs = [
            [
                'name' => "Piast Gliwice",
                'url_logo' => "https://i.imgur.com/yZJMMP8.png",
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

        DB::table('piastgliwice')->insert($clubs);
    }
}
