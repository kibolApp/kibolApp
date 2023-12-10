<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MiedzlegnicaSeeder extends Seeder
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
                'name' => "MKS Miedź Legnica",
                'url_logo' => "https://i.imgur.com/AJ27Q2w.png",
                'positive' => null,
                'negative' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'positive' => 'WKS Śląsk Wrocław',
                'negative' => null,
              
                
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'positive' => 'Lechia Gdańsk',
                'negative' => null,
              
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'positive' => 'Promień Żary',
                'negative' => 'BKS Stal Bielsko-Biała',
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Arka Gdynia',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'BKS Bolesławiec',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Chrobry Głogów',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Cracovia Kraków',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'GKS Katowice',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'GKS Tychy',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Górnik Polkowice',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Górnik Wałbrzych',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Górnik Zabrze',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Lech Poznań',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Legia Warszawa',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Motor Lublin',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Odra Opole',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Podbeskidzie Bielsko-Biała',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Polonia Świdnica',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Pogoń Szczecin',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Radomiak Radom',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Ruch Chorzów',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Sandecja Nowy Sącz',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Stal Rzeszów',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Stal Stalowa Wola',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Widzew Łódź',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Wisła Kraków',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Zawisza Bydgoszcz',
                'positive' => null,
            ],
            [
                'name' =>null,
                'url_logo'=>null,
                'negative' => 'Zagłębie Lubin',
                'positive' => null,
            ],
        ];

        
        DB::table('miedzlegnica')->insert($clubs);
    }
}
