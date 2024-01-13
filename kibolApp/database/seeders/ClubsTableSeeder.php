<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arkagdyniaPath = './database/seeders/assets/arkagdynia.png';
        $arkagdyniaBlob = File::get($arkagdyniaPath);
        $brukbettermalicaniecieczaPath = './database/seeders/assets/brukbettermalicanieciecza.png';
        $brukbettermalicaniecieczaBlob = File::get($brukbettermalicaniecieczaPath);
        $chrobryglogowPath = './database/seeders/assets/chrobryglogow.png';
        $chrobryglogowBlob = File::get($chrobryglogowPath);
        $cracoviakrakowPath = './database/seeders/assets/cracoviakrakow.png';
        $cracoviakrakowBlob = File::get($cracoviakrakowPath);
        $gkskatowicePath = './database/seeders/assets/gkskatowice.png';
        $gkskatowiceBlob = File::get($gkskatowicePath);
        $gkstychyPath = './database/seeders/assets/gkstychy.png';
        $gkstychyBlob = File::get($gkstychyPath);
        $gorniklecznaPath = './database/seeders/assets/gornikleczna.png';
        $gorniklecznaBlob = File::get($gorniklecznaPath);
        $gornikzabrzePath = './database/seeders/assets/gornikzabrze.png';
        $gornikzabrzeBlob = File::get($gornikzabrzePath);
        $jagielloniabialystokPath = './database/seeders/assets/jagielloniabialystok.png';
        $jagielloniabialystokBlob = File::get($jagielloniabialystokPath);
        $koronakielcePath = './database/seeders/assets/koronakielce.png';
        $koronakielceBlob = File::get($koronakielcePath);
        $lechiagdanskPath = './database/seeders/assets/lechiagdansk.png';
        $lechiagdanskBlob = File::get($lechiagdanskPath);
        $lechpoznanPath = './database/seeders/assets/lechpoznan.png';
        $lechpoznanBlob = File::get($lechpoznanPath);
        $legiawarszawaPath = './database/seeders/assets/legiawarszawa.png';
        $legiawarszawaBlob = File::get($legiawarszawaPath);
        $lkslodzPath = './database/seeders/assets/lkslodz.png';
        $lkslodzBlob = File::get($lkslodzPath);
        $miedzlegnicaPath = './database/seeders/assets/miedzlegnica.png';
        $miedzlegnicaBlob = File::get($miedzlegnicaPath);
        $motorlublinPath = './database/seeders/assets/motorlublin.png';
        $motorlublinBlob = File::get($motorlublinPath);
        $odraopolePath = './database/seeders/assets/odraopole.png';
        $odraopoleBlob = File::get($odraopolePath);
        $piastgliwicePath = './database/seeders/assets/piastgliwice.png';
        $piastgliwiceBlob = File::get($piastgliwicePath);
        $podbeskidziebielskobialaPath = './database/seeders/assets/podbeskidziebielskobiala.png';
        $podbeskidziebielskobialaBlob = File::get($podbeskidziebielskobialaPath);
        $pogonszczecinPath = './database/seeders/assets/pogonszczecin.png';
        $pogonszczecinBlob = File::get($pogonszczecinPath);
        $poloniawarszawaPath = './database/seeders/assets/poloniawarszawa.png';
        $poloniawarszawaBlob = File::get($poloniawarszawaPath);
        $puszczaniepolomicePath = './database/seeders/assets/puszczaniepolomice.png';
        $puszczaniepolomiceBlob = File::get($puszczaniepolomicePath);
        $radomiakradomPath = './database/seeders/assets/radomiakradom.png';
        $radomiakradomBlob = File::get($radomiakradomPath);
        $rakowczestochowaPath = './database/seeders/assets/rakowczestochowa.png';
        $rakowczestochowaBlob = File::get($rakowczestochowaPath);
        $resoviarzeszowPath = './database/seeders/assets/resoviarzeszow.png';
        $resoviarzeszowBlob = File::get($resoviarzeszowPath);
        $ruchchorzowPath = './database/seeders/assets/ruchchorzow.png';
        $ruchchorzowBlob = File::get($ruchchorzowPath);
        $slaskwroclawPath = './database/seeders/assets/slaskwroclaw.png';
        $slaskwroclawBlob = File::get($slaskwroclawPath);
        $stalmielecPath = './database/seeders/assets/stalmielec.png';
        $stalmielecBlob = File::get($stalmielecPath);
        $stalrzeszowPath = './database/seeders/assets/stalrzeszow.png';
        $stalrzeszowBlob = File::get($stalrzeszowPath);
        $wartapoznanPath = './database/seeders/assets/wartapoznan.png';
        $wartapoznanBlob = File::get($wartapoznanPath);
        $widzewlodzPath = './database/seeders/assets/widzewlodz.png';
        $widzewlodzBlob = File::get($widzewlodzPath);
        $wislakrakowPath = './database/seeders/assets/wislakrakow.png';
        $wislakrakowBlob = File::get($wislakrakowPath);
        $wislaplockPath = './database/seeders/assets/wislaplock.png';
        $wislaplockBlob = File::get($wislaplockPath);
        $zaglebielubinPath = './database/seeders/assets/zaglebielubin.png';
        $zaglebielubinBlob = File::get($zaglebielubinPath);
        $zaglebiesosnowiecPath = './database/seeders/assets/zaglebiesosnowiec.png';
        $zaglebiesosnowiecBlob = File::get($zaglebiesosnowiecPath);
        $zniczpruszkowPath = './database/seeders/assets/zniczpruszkow.png';
        $zniczpruszkowBlob = File::get($zniczpruszkowPath);

        $clubs = [

            [
                'team' => "Miedz Legnica",
                'latitude' => 51.203600,
                'longitude' => 16.169939,
                'address' => "Stadion MKS Miedź Legnica im. Orła Białego - Hetmańska 2",
                'logo' => $miedzlegnicaBlob,
                'url'=>'miedzlegnica'
            ],
            [
                'team' => "Cracovia Kraków",
                'latitude' => 50.058006,
                'longitude' => 19.920449,
                'address' => "Stadion Cracovii im. Józefa Piłsudskiego - Józefa Kałuży 1",
                'logo' => $cracoviakrakowBlob,
                'url'=>'cracoviakrakow'
            ],
            [
                'team' => "Górnik Zabrze",
                'latitude' => 50.296299,
                'longitude' => 18.768331,
                'address' => "Arena Zabrze - Roosevelta 81",
                'logo' => $gornikzabrzeBlob,
                'url'=>'gornikzabrze'
            ],
            [
                'team' => "Jagiellonia Białystok",
                'latitude' => 53.106014,
                'longitude' => 23.149256,
                'address' => "Stadion Miejski w Białymstoku - Słoneczna 1",
                'logo' => $jagielloniabialystokBlob,
                'url'=>'jagielloniabialystok'
            ],
            [
                'team' => "Korona Kielce",
                'latitude' => 50.861489,
                'longitude' => 20.624842,
                'address' => "Arena Kielce, Suzuki Arena - Księdza Piotra Ściegiennego 8",
                'logo' => $koronakielceBlob,
                'url'=>'koronakielce'
            ],
            [
                'team' => "Lech Poznań",
                'latitude' =>52.397536 ,
                'longitude' => 16.858129,
                'address' => "Enea Stadion - Bułgarska 17",
                'logo' => $lechpoznanBlob,
                'url'=>'lechpoznan'
            ],
            [
                'team' => "Legia Warszawa",
                'latitude' => 52.220448,
                'longitude' => 21.040688,
                'address' => "Stadion Miejski Legii Warszawa - Łazienkowska 3",
                'logo' => $legiawarszawaBlob,
                'url'=>'legiawarszawa'
            ],
            [
                'team' => "ŁKS Łódź",
                'latitude' => 51.758942,
                'longitude' => 19.426245,
                'address' => "Stadion Króla - aleja Unii Lubelskiej 2",
                'logo' => $lkslodzBlob,
                'url'=>'lkslodz'
            ],
            [
                'team' => "Piast Gliwice",
                'latitude' => 50.306583,
                'longitude' => 18.695866,
                'address' => "Stadion Miejski w Gliwicach - Stefana Okrzei 20",
                'logo' => $piastgliwiceBlob,
                'url'=>'piastgliwice'
            ],
            [
                'team' => "Pogoń Szczecin",
                'latitude' => 53.436476,
                'longitude' =>14.518776 ,
                'address' => "Stadion Miejski im. Floriana Krygiera - Mieczysława Karłowicza 28",
                'logo' => $pogonszczecinBlob,
                'url'=>'pogonszczecin'
            ],
            [
                'team' => "Puszcza Niepołomice",
                'latitude' => 50.031824,
                'longitude' =>20.221173,
                'address' => "Stadion Miejski w Niepołomicach - Janusza Kusocińskiego 2",
                'logo' => $puszczaniepolomiceBlob,
                'url'=>'puszczaniepolomice'
            ],
            [
                'team' => "Radomiak Radom",
                'latitude' => 51.409795,
                'longitude' => 21.171910,
                'address' => "Stadion Miejski im. Braci Czachorów - Andrzeja Struga 63",
                'logo' => $radomiakradomBlob,
                'url'=>'radomiakradom'
            ],
            [
                'team' => "Raków Częstochowa",
                'latitude' => 50.776811,
                'longitude' => 19.159258,
                'address' => "Miejski Stadion Piłkarski RKS Raków Częstochowa - Bolesława Limanowskiego 83",
                'logo' => $rakowczestochowaBlob,
                'url'=>'rakowczestochowa'
            ],
            [
                'team' => "Ruch Chorzów",
                'latitude' => 50.282243,
                'longitude' =>18.944547,
                'address' => "Stadion Klubu Sportowego Ruch Chorzów - Cicha 6",
                'logo' => $ruchchorzowBlob,
                'url'=>'ruchchorzow'
            ],
            [
                'team' => "Stal Mielec",
                'latitude' => 50.298660,
                'longitude' => 21.435882,
                'address' => "Stadion Miejski w Mielcu - Solskiego 1",
                'logo' => $stalmielecBlob,
                'url'=>'stalmielec'
            ],
            [
                'team' => "Śląsk Wrocław",
                'latitude' => 51.141186,
                'longitude' => 16.943674,
                'address' => "Tarczyński Arena Wrocław - al. Śląska 1",
                'logo' => $slaskwroclawBlob,
                'url'=>'slaskwroclaw'
            ],
            [
                'team' => "Warta Poznań",
                'latitude' => 52.393564,
                'longitude' =>16.931124 ,
                'address' => "Stadion Warty Poznań (Ogródek) - Droga Dębińska 12",
                'logo' => $wartapoznanBlob,
                'url'=>'wartapoznan'
            ],
            [
                'team' => "Widzew Łódź",
                'latitude' => 51.765164,
                'longitude' => 19.511799,
                'address' => "Serce Łodzi - al. marsz. Józefa Piłsudskiego 138",
                'logo' => $widzewlodzBlob,
                'url'=>'widzewlodz'
            ],
            [
                'team' => "Zagłębie Lubin",
                'latitude' => 51.413976,
                'longitude' =>16.198171 ,
                'address' => "Stadion Zagłębia Lubin - Marii Skłodowskiej - Curie 98",
                'logo' => $zaglebielubinBlob,
                'url'=>'zaglebielubin'
            ],
            /* Pierwsza Liga  */
            [
                'team' => "Arka Gdynia",
                'latitude' =>54.493203 ,
                'longitude' =>18.531112 ,
                'address' => "Stadion Miejski w Gdyni - Olimpijska 5",
                'logo' => $arkagdyniaBlob,
                'url'=>'arkagdynia'
            ],
            [
                'team' => "Bruk-Bet Termalica Nieciecza",
                'latitude' =>50.158386 ,
                'longitude' =>20.849128 ,
                'address' => "Stadion Sportowy BRUK-BET Termalica Nieciecza - Nieciecza 199",
                'logo' => $brukbettermalicaniecieczaBlob,
                'url'=>'brukbettermalicanieciecza'
            ],
            [
                'team' => "Chrobry Głogów",
                'latitude' => 51.655913,
                'longitude' => 16.096825,
                'address' => "Stadion Miejski w Głogowie - Wita Stwosza 3",
                'logo' => $chrobryglogowBlob,
                'url'=>'chrobryglogow'
            ],
            [
                'team' => "GKS Katowice",
                'latitude' => 50.279721,
                'longitude' =>19.001200 ,
                'address' => "GKS GieKSa Katowice S.A. - Bukowa 1A",
                'logo' => $gkskatowiceBlob,
                'url'=>'gkskatowice'
            ],
            [
                'team' => "GKS Tychy",
                'latitude' => 50.124054,
                'longitude' => 18.990624,
                'address' => "Stadion Miejski W Tychach - Edukacji 7",
                'logo' => $gkstychyBlob,
                'url'=>'gkstychy'
            ],
            [
                'team' => "Górnik Łęczna",
                'latitude' =>51.301619 ,
                'longitude' =>22.875952 ,
                'address' => "Stadion Piłkarski GKS Górnik Łęczna - al. Jana Pawła II 13",
                'logo' => $gorniklecznaBlob,
                'url'=>'gornikleczna'
            ],
            [
                'team' => "Lechia Gdańsk",
                'latitude' => 54.389995,
                'longitude' => 18.640154,
                'address' => "Polsat Plus Arena Gdańsk - Pokoleń Lechii Gdańsk 1",
                'logo' => $lechiagdanskBlob,
                'url'=>'lechiagdansk'
            ],
            [
                'team' => "Motor Lublin",
                'latitude' => 51.232428,
                'longitude' => 22.557482,
                'address' => "Arena Lublin - Stadionowa 1",
                'logo' => $motorlublinBlob,
                'url'=>'motorlublin'
            ],
            [
                'team' => "Odra Opole",
                'latitude' => 50.676340,
                'longitude' =>17.932094 ,
                'address' => "Stadion Miejski OKS Odra Opole - Oleska 51",
                'logo' => $odraopoleBlob,
                'url'=>'odraopole'
            ],
            [
                'team' => "Podbeskidzie Bielsko-Biała",
                'latitude' =>49.817422 ,
                'longitude' =>19.054301 ,
                'address' => "Stadion Miejski w Bielsku-Białej - Tadeusza Rychlińskiego 19",
                'logo' => $podbeskidziebielskobialaBlob,
                'url'=>'podbeskidziebielskobiala'
            ],
            [
                'team' => "Polonia Warszawa",
                'latitude' => 52.255557,
                'longitude' =>21.001371 ,
                'address' => "Stadion Polonii Warszawa - Konwiktorska 6",
                'logo' => $poloniawarszawaBlob,
                'url'=>'poloniawarszawa'
            ],
            [
                'team' => "Resovia Rzeszów",
                'latitude' => 50.040642,
                'longitude' => 21.983011,
                'address' => "Stadion Miejski ROSiR - Stanisława Wyspiańskiego 22",
                'logo' => $resoviarzeszowBlob,
                'url'=>'resoviarzeszow'
            ],
            [
                'team' => "Stal Rzeszów",
                'latitude' =>50.021478 ,
                'longitude' =>21.996199 ,
                'address' => "Stadion Miejski Stal - Hetmańska 69",
                'logo' => $stalrzeszowBlob,
                'url'=>'stalrzeszow'
            ],
            [
                'team' => "Wisła Kraków",
                'latitude' => 50.063736,
                'longitude' => 19.911817,
                'address' => "Stadion Miejski im. Henryka Reymana - Władysława Reymonta 22",
                'logo' => $wislakrakowBlob,
                'url'=>'wislakrakow'
            ],
            [
                'team' => "Wisła Płock",
                'latitude' =>52.562007 ,
                'longitude' =>19.684123 ,
                'address' => "Orlen Stadion - ul. Łukasiewicza 34",
                'logo' => $wislaplockBlob,
                'url'=>'wislaplock'
            ],
            [
                'team' => "Zagłębie Sosnowiec",
                'latitude' => 50.277328,
                'longitude' => 19.103581,
                'address' => "Stadion Ludowy - Kresowa 1",
                'logo' => $zaglebiesosnowiecBlob,
                'url'=>'zaglebiesosnowiec'
            ],
            [
                'team' => "Znicz Pruszków",
                'latitude' => 52.169157,
                'longitude' => 20.813007,
                'address' => "Stadion MZOS Znicz - Bohaterów Warszawy 4",
                'logo' => $zniczpruszkowBlob,
                'url'=>'zniczpruszkow'
            ],
        ];


        DB::table('clubs')->insert($clubs);
    }
}
