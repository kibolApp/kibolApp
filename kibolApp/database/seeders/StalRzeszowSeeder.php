<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StalRzeszowSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Karpaty Krosno"];

        $negativeClubs = [
            "Resovia Rzeszów", "Stal Sanok", "JKS Jarosław", "Czuwaj Przemyśl", "Siarka Tarnobrzeg",
            "Stal Mielec", "Wisłoka Dębica", "Czarni Jasło", "Unia Nowa Sarzyna", "Unia Tarnów",
            "Tarnovia Tarnów", "Sandecja Nowy Sącz", "GKS Tychy", "Górnik Zabrze", "GKS Katowice",
            "Śląsk Wrocław", "Miedź Legnica", "Motor Lublin", "Górnik Łęczna", "Hetman Zamość",
            "Chełmianka Chełm", "ŁKS Łódź", "Wisła Sandomierz", "Zawisza Bydgoszcz", "Apator Toruń"
        ];
        $coordinates = [
            ["lat" => 50.109607283764035, "lng" => 23.30735071391919],
            ["lat" => 50.04313093251366, "lng" => 22.18365267283602],
            ["lat" => 50.03418336819155, "lng" => 22.012756683754247],
            ["lat" => 50.02429779882655, "lng" => 21.704246586024567],
            ["lat" => 49.392416010722286, "lng" => 21.837160750380065],
            ["lat" => 49.349146665311906, "lng" => 21.961019849843808],
            ["lat" => 49.28015076205142, "lng" => 22.039500833529758],
            ["lat" => 49.224496773183915, "lng" => 22.03392695725492],
            ["lat" => 49.2053483459371, "lng" => 22.147015948729376],
            ["lat" => 49.19004529659267, "lng" => 22.148499349532216],
            ["lat" => 49.18335459391099, "lng" => 22.235000708756445],
            ["lat" => 49.15566434163085, "lng" => 22.22321925618516],
            ["lat" => 49.14612656539103, "lng" => 22.366656171989916],
            ["lat" => 49.10232256792537, "lng" => 22.4233106742615],
            ["lat" => 49.097568159925714, "lng" => 22.594199818430496],
            ["lat" => 49.04346321518747, "lng" => 22.676390795662854],
            ["lat" => 49.05389089216237, "lng" => 22.765565162253296],
            ["lat" => 49.02262737500536, "lng" => 22.836201607823398],
            ["lat" => 49.00276285607492, "lng" => 22.844408944864398],
            ["lat" => 49.00749035823861, "lng" => 22.89111936280736],
            ["lat" => 49.01884183313089, "lng" => 22.889988367204666],
            ["lat" => 49.039672946104986, "lng" => 22.87017786203691],
            ["lat" => 49.06242747121766, "lng" => 22.864974974334928],
            ["lat" => 49.09376560571283, "lng" => 22.88921212197681],
            ["lat" => 49.110883906554164, "lng" => 22.854618212898743],
            ["lat" => 49.136594211344374, "lng" => 22.79678543126741],
            ["lat" => 49.15566434163085, "lng" => 22.785543830845796],
            ["lat" => 49.15566434163085, "lng" => 22.766506800975094],
            ["lat" => 49.15948097127858, "lng" => 22.740233924084947],
            ["lat" => 49.17953253180664, "lng" => 22.753878351659466],
            ["lat" => 49.180487965769146, "lng" => 22.73631036134165],
            ["lat" => 49.16616216312403, "lng" => 22.72280463567074],
            ["lat" => 49.171891017022546, "lng" => 22.708276514571253],
            ["lat" => 49.21874995475963, "lng" => 22.73863549110041],
            ["lat" => 49.2225809488225, "lng" => 22.7166970694374],
            ["lat" => 49.2484864022033, "lng" => 22.74080228107954],
            ["lat" => 49.366606825382405, "lng" => 22.75054098552826],
            ["lat" => 49.491300111513624, "lng" => 22.691383791905338],
            ["lat" => 49.52681181063289, "lng" => 22.64510941513342],
            ["lat" => 49.656309080469555, "lng" => 22.783373061137183],
            ["lat" => 49.68955419852452, "lng" => 22.797234042278774],
            ["lat" => 49.70001633426179, "lng" => 22.837141824406586],
            ["lat" => 49.7419304071623, "lng" => 22.880744809418957],
            ["lat" => 49.770568429895064, "lng" => 22.904994964289045],
            ["lat" => 49.802126829657226, "lng" => 22.9559497046657],
            ["lat" => 49.83470368945845, "lng" => 22.96418518500019],
            ["lat" => 49.83949973368627, "lng" => 22.986491919454807],
            ["lat" => 50.109607283764035, "lng" => 23.30735071391919],
        ];


        $clubs = [
            [
                'name' => "Stal Rzeszów",
                'url_logo' => "https://i.imgur.com/Mt0ygDr.png",
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

        DB::table('stalrzeszow')->insert($clubs);
    }
}
