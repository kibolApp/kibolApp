<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LechiaGdanskSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Śląsk Wrocław", "Gryf Słupsk"];
        $negativeClubs = ["Arka Gdynia", "Cracovia Kraków", "Lech Poznań", "Pogoń Szczecin", "Zawisza Bydgoszcz"];
        $coordinates = [
            ["lat" => 54.23705411901477, "lng" => 16.78477904729357],
            ["lat" => 53.67096247070256, "lng" => 16.866390150283223],
            ["lat" => 53.54157665159937, "lng" => 16.97830520344786],
            ["lat" => 53.50649458283897, "lng" => 17.37781616820871],
            ["lat" => 53.60726066698351, "lng" => 17.42157770948336],
            ["lat" => 53.61817177794373, "lng" => 17.506493944187042],
            ["lat" => 53.583681823479054, "lng" => 17.55131527487208],
            ["lat" => 53.6255088977702, "lng" => 17.709348409731774],
            ["lat" => 53.69399514366367, "lng" => 17.747674283817815],
            ["lat" => 53.69255504213703, "lng" => 17.822991238377227],
            ["lat" => 53.71920300433905, "lng" => 17.888355366989913],
            ["lat" => 53.75392622699334, "lng" => 17.86382174713043],
            ["lat" => 53.73526162691056, "lng" => 18.011817454924767],
            ["lat" => 53.778329430668094, "lng" => 18.064183078009336],
            ["lat" => 53.76238299917577, "lng" => 18.17537491476591],
            ["lat" => 53.74788754846955, "lng" => 18.25659875635128],
            ["lat" => 53.702484278878586, "lng" => 18.288741811830732],
            ["lat" => 53.69178494537098, "lng" => 18.459220361648107],
            ["lat" => 53.769885402185395, "lng" => 18.94330327924277],
            ["lat" => 53.655661424884386, "lng" => 18.767307297531772],
            ["lat" => 53.59997870991995, "lng" => 18.916125023576996],
            ["lat" => 53.59999401952021, "lng" => 19.14665718366234],
            ["lat" => 53.421537924182786, "lng" => 19.377377369083092],
            ["lat" => 53.183376933482236, "lng" => 20.21495643586732],
            ["lat" => 53.48218635220536, "lng" => 21.450557686077985],
            ["lat" => 53.51309420771318, "lng" => 21.878697411634647],
            ["lat" => 53.63976841537411, "lng" => 22.342404549418973],
            ["lat" => 53.87174723874375, "lng" => 22.767830103895818],
            ["lat" => 54.179081444002804, "lng" => 22.496580495803954],
            ["lat" => 54.24862886279186, "lng" => 22.47657716178685],
            ["lat" => 54.35454092748131, "lng" => 22.781796245043154],
            ["lat" => 54.31922054819745, "lng" => 21.53181725908709],
            ["lat" => 54.37149217796269, "lng" => 20.468496636446417],
            ["lat" => 54.43111363810195, "lng" => 19.796706654824533],
            ["lat" => 54.4766428381605, "lng" => 18.53210828578372],
            ["lat" => 54.23705411901477, "lng" => 16.78477904729357],
        ];
        

        $clubs = [
            [
                'name' => "Lechia Gdańsk",
                'url_logo' => "https://i.imgur.com/IQnXfez.png",
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

        DB::table('lechiagdansk')->insert($clubs);
    }
}
