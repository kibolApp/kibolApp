<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clubs = [

            [
                'team' => "Miedz Legnica",
                'latitude' => 51.203600,
                'longitude' => 16.169939,
                'address' => "Stadion MKS Miedź Legnica im. Orła Białego - Hetmańska 2",
                'url_logo' => asset('miedzlegnica.png'),
                'url'=>'miedzlegnica'
            ],
            [
                'team' => "Cracovia Kraków",
                'latitude' => 50.058006,
                'longitude' => 19.920449,
                'address' => "Stadion Cracovii im. Józefa Piłsudskiego - Józefa Kałuży 1",
                'url_logo' => asset('cracoviakrakow.png'),
                'url'=>'cracoviakrakow'
            ],
            [
                'team' => "Górnik Zabrze",
                'latitude' => 50.296299,
                'longitude' => 18.768331,
                'address' => "Arena Zabrze - Roosevelta 81",
                'url_logo' => asset('gornikzabrze.png'),
                'url'=>'gornikzabrze'
            ],
            [
                'team' => "Jagiellonia Białystok",
                'latitude' => 53.106014,
                'longitude' => 23.149256,
                'address' => "Stadion Miejski w Białymstoku - Słoneczna 1",
                'url_logo' => asset('jagielloniabialystok.png'),
                'url'=>'jagielloniabialystok'
            ],
            [
                'team' => "Korona Kielce",
                'latitude' => 50.861489,
                'longitude' => 20.624842,
                'address' => "Arena Kielce, Suzuki Arena - Księdza Piotra Ściegiennego 8",
                'url_logo' => asset('koronakielce.png'),
                'url'=>'koronakielce'
            ],
            [
                'team' => "Lech Poznań",
                'latitude' =>52.397536 ,
                'longitude' => 16.858129,
                'address' => "Enea Stadion - Bułgarska 17",
                'url_logo' => asset('lechpoznan.png'),
                'url'=>'lechpoznan'
            ],
            [
                'team' => "Legia Warszawa",
                'latitude' => 52.220448,
                'longitude' => 21.040688,
                'address' => "Stadion Miejski Legii Warszawa - Łazienkowska 3",
                'url_logo' => asset('legiawarszawa.png'),
                'url'=>'legiawarszawa'
            ],
            [
                'team' => "ŁKS Łódź",
                'latitude' => 51.758942,
                'longitude' => 19.426245,
                'address' => "Stadion Króla - aleja Unii Lubelskiej 2",
                'url_logo' => asset('lkslodz.png'),
                'url'=>'lkslodz'
            ],
            [
                'team' => "Piast Gliwice",
                'latitude' => 50.306583,
                'longitude' => 18.695866,
                'address' => "Stadion Miejski w Gliwicach - Stefana Okrzei 20",
                'url_logo' => asset('piastgliwice.png'),
                'url'=>'piastgliwice'
            ],
            [
                'team' => "Pogoń Szczecin",
                'latitude' => 53.436476,
                'longitude' =>14.518776 ,
                'address' => "Stadion Miejski im. Floriana Krygiera - Mieczysława Karłowicza 28",
                'url_logo' => asset('pogonszczecin.png'),
                'url'=>'pogonszczecin'
            ],
            [
                'team' => "Puszcza Niepołomice",
                'latitude' => 50.031824,
                'longitude' =>20.221173,
                'address' => "Stadion Miejski w Niepołomicach - Janusza Kusocińskiego 2",
                'url_logo' => asset('puszczaniepolomice.png'),
                'url'=>'puszczaniepolomice'
            ],
            [
                'team' => "Radomiak Radom",
                'latitude' => 51.409795,
                'longitude' => 21.171910,
                'address' => "Stadion Miejski im. Braci Czachorów - Andrzeja Struga 63",
                'url_logo' => asset('radomiakradom.png'),
                'url'=>'radomiakradom'
            ],
            [
                'team' => "Raków Częstochowa",
                'latitude' => 50.776811,
                'longitude' => 19.159258,
                'address' => "Miejski Stadion Piłkarski RKS Raków Częstochowa - Bolesława Limanowskiego 83",
                'url_logo' => asset('rakowczestochowa.png'),
                'url'=>'rakowczestochowa'
            ],
            [
                'team' => "Ruch Chorzów",
                'latitude' => 50.282243,
                'longitude' =>18.944547,
                'address' => "Stadion Klubu Sportowego Ruch Chorzów - Cicha 6",
                'url_logo' => asset('ruchchorzow.png'),
                'url'=>'ruchchorzow'
            ],
            [
                'team' => "Stal Mielec",
                'latitude' => 50.298660,
                'longitude' => 21.435882,
                'address' => "Stadion Miejski w Mielcu - Solskiego 1",
                'url_logo' => asset('stalmielec.png'),
                'url'=>'stalmielec'
            ],
            [
                'team' => "Śląsk Wrocław",
                'latitude' => 51.141186,
                'longitude' => 16.943674,
                'address' => "Tarczyński Arena Wrocław - al. Śląska 1",
                'url_logo' => asset('slaskwroclaw.png'),
                'url'=>'slaskwroclaw'
            ],
            [
                'team' => "Warta Poznań",
                'latitude' => 52.393564,
                'longitude' =>16.931124 ,
                'address' => "Stadion Warty Poznań (Ogródek) - Droga Dębińska 12",
                'url_logo' => asset('wartapoznan.png'),
                'url'=>'wartapoznan'
            ],
            [
                'team' => "Widzew Łódź",
                'latitude' => 51.765164,
                'longitude' => 19.511799,
                'address' => "Serce Łodzi - al. marsz. Józefa Piłsudskiego 138",
                'url_logo' => asset('widzewlodz.png'),
                'url'=>'widzewlodz'
            ],
            [
                'team' => "Zagłębie Lubin",
                'latitude' => 51.413976,
                'longitude' =>16.198171 ,
                'address' => "Stadion Zagłębia Lubin - Marii Skłodowskiej - Curie 98",
                'url_logo' => asset('zaglebielubin.png'),
                'url'=>'zaglebielubin'
            ],
            /* Pierwsza Liga  */
            [
                'team' => "Arka Gdynia",
                'latitude' =>54.493203 ,
                'longitude' =>18.531112 ,
                'address' => "Stadion Miejski w Gdyni - Olimpijska 5",
                'url_logo' => asset('arkagdynia.png'),
                'url'=>'arkagdynia'
            ],
            [
                'team' => "Bruk-Bet Termalica Nieciecza",
                'latitude' =>50.158386 ,
                'longitude' =>20.849128 ,
                'address' => "Stadion Sportowy BRUK-BET Termalica Nieciecza - Nieciecza 199",
                'url_logo' => asset('brukbettermalicanieciecza.png'),
                'url'=>'brukbettermalicanieciecza'
            ],
            [
                'team' => "Chrobry Głogów",
                'latitude' => 51.655913,
                'longitude' => 16.096825,
                'address' => "Stadion Miejski w Głogowie - Wita Stwosza 3",
                'url_logo' => asset('chrobryglogow.png'),
                'url'=>'chrobryglogow'
            ],
            [
                'team' => "GKS Katowice",
                'latitude' => 50.279721,
                'longitude' =>19.001200 ,
                'address' => "GKS GieKSa Katowice S.A. - Bukowa 1A",
                'url_logo' => asset('gkskatowice.png'),
                'url'=>'gkskatowice'
            ],
            [
                'team' => "GKS Tychy",
                'latitude' => 50.124054,
                'longitude' => 18.990624,
                'address' => "Stadion Miejski W Tychach - Edukacji 7",
                'url_logo' => asset('gkstychy.png'),
                'url'=>'gkstychy'
            ],
            [
                'team' => "Górnik Łęczna",
                'latitude' =>51.301619 ,
                'longitude' =>22.875952 ,
                'address' => "Stadion Piłkarski GKS Górnik Łęczna - al. Jana Pawła II 13",
                'url_logo' => asset('gornikleczna.png'),
                'url'=>'gornikleczna'
            ],
            [
                'team' => "Lechia Gdańsk",
                'latitude' => 54.389995,
                'longitude' => 18.640154,
                'address' => "Polsat Plus Arena Gdańsk - Pokoleń Lechii Gdańsk 1",
                'url_logo' => asset('lechiagdansk.png'),
                'url'=>'lechiagdansk'
            ],
            [
                'team' => "Motor Lublin",
                'latitude' => 51.232428,
                'longitude' => 22.557482,
                'address' => "Arena Lublin - Stadionowa 1",
                'url_logo' => asset('motorlublin.png'),
                'url'=>'motorlublin'
            ],
            [
                'team' => "Odra Opole",
                'latitude' => 50.676340,
                'longitude' =>17.932094 ,
                'address' => "Stadion Miejski OKS Odra Opole - Oleska 51",
                'url_logo' => asset('odraopole.png'),
                'url'=>'odraopole'
            ],
            [
                'team' => "Podbeskidzie Bielsko-Biała",
                'latitude' =>49.817422 ,
                'longitude' =>19.054301 ,
                'address' => "Stadion Miejski w Bielsku-Białej - Tadeusza Rychlińskiego 19",
                'url_logo' => asset('podbeskidziebielskobiala.png'),
                'url'=>'podbeskidziebielskobiala'
            ],
            [
                'team' => "Polonia Warszawa",
                'latitude' => 52.255557,
                'longitude' =>21.001371 ,
                'address' => "Stadion Polonii Warszawa - Konwiktorska 6",
                'url_logo' => asset('poloniawarszawa.png'),
                'url'=>'poloniawarszawa'
            ],
            [
                'team' => "Resovia Rzeszów",
                'latitude' => 50.040642,
                'longitude' => 21.983011,
                'address' => "Stadion Miejski ROSiR - Stanisława Wyspiańskiego 22",
                'url_logo' => asset('resoviarzeszow.png'),
                'url'=>'resoviarzeszow'
            ],
            [
                'team' => "Stal Rzeszów",
                'latitude' =>50.021478 ,
                'longitude' =>21.996199 ,
                'address' => "Stadion Miejski Stal - Hetmańska 69",
                'url_logo' => asset('stalrzeszow.png'),
                'url'=>'stalrzeszow'
            ],
            [
                'team' => "Wisła Kraków",
                'latitude' => 50.063736,
                'longitude' => 19.911817,
                'address' => "Stadion Miejski im. Henryka Reymana - Władysława Reymonta 22",
                'url_logo' => asset('wislakrakow.png'),
                'url'=>'wislakrakow'
            ],
            [
                'team' => "Wisła Płock",
                'latitude' =>52.562007 ,
                'longitude' =>19.684123 ,
                'address' => "Orlen Stadion - ul. Łukasiewicza 34",
                'url_logo' => asset('wislaplock.png'),
                'url'=>'wislaplock'
            ],
            [
                'team' => "Zagłębie Sosnowiec",
                'latitude' => 50.277328,
                'longitude' => 19.103581,
                'address' => "Stadion Ludowy - Kresowa 1",
                'url_logo' => asset('zaglebiesosnowiec.png'),
                'url'=>'zaglebiesosnowiec'
            ],
            [
                'team' => "Znicz Pruszków",
                'latitude' => 52.169157,
                'longitude' => 20.813007,
                'address' => "Stadion MZOS Znicz - Bohaterów Warszawy 4",
                'url_logo' => asset('zniczpruszkow.png'),
                'url'=>'zniczpruszkow'
            ],
        ];


        DB::table('clubs')->insert($clubs);
    }
}
