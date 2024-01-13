<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GornikLecznaSeeder extends Seeder
{
    public function run()
    {
        $positiveClubs = ["Chełmianka Chełm"];
        $negativeClubs = [
            "Avia Świdnik", "Stal Stalowa Wola", "Łada Biłgoraj", "Tomasovia Tomaszów Lubelski",
            "Orlęta Radzyń Podlaski", "Orlęta Łuków", "Wisła Puławy", "Stal Rzeszów", "Karpaty Krosno",
            "Polonia Przemyśl", "Siarka Tarnobrzeg", "Stal Mielec", "Sokół Nisko", "Wisła Kraków",
            "Widzew Łódź", "Ruch Chorzów", "Elana Toruń", "GKS Jastrzębie", "Chemik Kędzierzyn-Koźle",
            "Korona Kielce", "Legia Warszawa", "Radomiak Radom", "Olimpia Elbląg", "Wisła Płock",
            "Pogoń Szczecin", "Arka Gdynia", "Lech Poznań"
        ];
        $coordinates = [
            ["lat" => 51.23657075444726, "lng" => 22.6849272673241],
            ["lat" => 51.20357939718542, "lng" => 22.591195421584473],
            ["lat" => 50.33607592134601, "lng" => 22.472313825744095],
            ["lat" => 50.24783197825238, "lng" => 23.572644106319416],
            ["lat" => 50.382704287566185, "lng" => 23.70578202901129],
            ["lat" => 50.41548708667628, "lng" => 23.9955378863647],
            ["lat" => 50.487193422484836, "lng" => 24.068736219863155],
            ["lat" => 50.63390616297889, "lng" => 24.08910004419016],
            ["lat" => 50.71727465676847, "lng" => 24.07321082013405],
            ["lat" => 50.72445381172369, "lng" => 24.017444694193216],
            ["lat" => 50.76778355460394, "lng" => 24.02208553162427],
            ["lat" => 50.78305623334708, "lng" => 23.963011182557352],
            ["lat" => 50.817217788084406, "lng" => 23.966413473116717],
            ["lat" => 50.838495657862154, "lng" => 24.001987440051295],
            ["lat" => 50.84438442843748, "lng" => 24.125744803587168],
            ["lat" => 50.86883732437056, "lng" => 24.138498192052026],
            ["lat" => 50.90631656593112, "lng" => 24.031686967761544],
            ["lat" => 51.007274296053254, "lng" => 23.921357032265462],
            ["lat" => 51.07514560373846, "lng" => 23.91169506396716],
            ["lat" => 51.083467065070124, "lng" => 23.87446650496446],
            ["lat" => 51.14953922572266, "lng" => 23.865663424842893],
            ["lat" => 51.208323011023225, "lng" => 23.7532430296246],
            ["lat" => 51.28819988699388, "lng" => 23.64940839884227],
            ["lat" => 51.332367699330604, "lng" => 23.635089179681472],
            ["lat" => 51.40759252079238, "lng" => 23.690064055997112],
            ["lat" => 51.48234909573446, "lng" => 23.667350609591864],
            ["lat" => 51.53893368279941, "lng" => 23.56868870205531],
            ["lat" => 51.73897420344045, "lng" => 23.52669694873569],
            ["lat" => 51.78568297469593, "lng" => 23.62482616019591],
            ["lat" => 51.985844648997926, "lng" => 23.680983162536478],
            ["lat" => 52.10634543569117, "lng" => 23.613187519857377],
            ["lat" => 52.17698066066757, "lng" => 23.488933374356748],
            ["lat" => 52.275674795780986, "lng" => 23.189422123330814],
            ["lat" => 52.550430473942185, "lng" => 22.497808389169194],
            ["lat" => 52.10770521527678, "lng" => 22.163115927989168],
            ["lat" => 51.23657075444726, "lng" => 22.6849272673241],
        ];

        $clubs = [
            [
                'name' => "Górnik Łęczna",
                'url_logo' => asset('gornikleczna.png'),
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
        DB::table('gornikleczna')->insert($clubs);
    }
}
