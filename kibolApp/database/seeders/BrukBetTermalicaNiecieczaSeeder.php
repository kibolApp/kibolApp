<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrukBetTermalicaNiecieczaSeeder extends Seeder
{
    public function run()
    {
        // No positive relationships mentioned
        $positiveClubs = ["Kibice Termalici Bruk-Bet Nieciecza"];

        $negativeClubs = ["Stal Mielec", "Sandencja Nowy Sącz", "Cracovia Kraków"];

        $coordinates = [
            ["lat" => 50.210768812111354, "lng" => 20.629326986719633],
            ["lat" => 49.613521272458485, "lng" => 20.59978490409054],
            ["lat" => 49.37731745038664, "lng" => 20.56530399462335],
            ["lat" => 49.415940857247534, "lng" => 20.625358899618078],
            ["lat" => 49.401708210705976, "lng" => 20.659636130422427],
            ["lat" => 49.420007964148084, "lng" => 20.697523074817752],
            ["lat" => 49.40374123376745, "lng" => 20.75682476143936],
            ["lat" => 49.36512588949546, "lng" => 20.784381657145303],
            ["lat" => 49.338719576467724, "lng" => 20.827761951337692],
            ["lat" => 49.35496820054337, "lng" => 20.853099268816777],
            ["lat" => 49.32653607946057, "lng" => 20.871361790411072],
            ["lat" => 49.319472055405356, "lng" => 20.884575146793765],
            ["lat" => 49.32440613951735, "lng" => 20.895869675547857],
            ["lat" => 49.32032957185629, "lng" => 20.90770115938102],
            ["lat" => 49.315616275760846, "lng" => 20.904986128772208],
            ["lat" => 49.311337910147586, "lng" => 20.909865148168223],
            ["lat" => 49.300029844521504, "lng" => 20.922511973563957],
            ["lat" => 49.29641180508827, "lng" => 20.927705520785906],
            ["lat" => 49.30856025963635, "lng" => 20.963533909912172],
            ["lat" => 49.3079196306833, "lng" => 20.98493466739157],
            ["lat" => 49.31347632609186, "lng" => 20.994335203312062],
            ["lat" => 49.32354745248492, "lng" => 20.987382553687524],
            ["lat" => 49.3338680052517, "lng" => 20.99696216397558],
            ["lat" => 49.33602260771346, "lng" => 21.009614198007],
            ["lat" => 49.346818920288456, "lng" => 21.01031325424185],
            ["lat" => 49.351364985536605, "lng" => 21.02175775802391],
            ["lat" => 50.32089216534621, "lng" => 21.061307178516756],
            ["lat" => 50.32795297108839, "lng" => 20.641559635170495],
            ["lat" => 50.210768812111354, "lng" => 20.629326986719633]
    ];

        $clubs = [
            [
                'name' => "Termalica Bruk-Bet Nieciecza",
                'url_logo' => asset('brukbettermalicanieciecza.png'),
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

        DB::table('brukbettermalicanieciecza')->insert($clubs);
    }
}
