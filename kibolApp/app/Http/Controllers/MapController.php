<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorderRequest;
use App\Models\Clubs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MapController extends Controller
{
    public function fetchclubs() {
        /** @var \App\Models\Clubs $user */
        
        $profiles=Clubs::all();
        $response = response()->json($profiles);

        return $response;
    }


    public function getLngAndLat() {
        
        if (Schema::hasTable('clubs')) {
            $urls = DB::table('clubs')->pluck('url')->unique()->toArray();
            $allData = [];
    
            foreach ($urls as $tableName) {
             
                if (Schema::hasTable($tableName)) {
                 
                    $data = DB::table($tableName)
                        ->select('name', 'lat', 'lng')
                        ->get();
        
               
                    $allData[] = $data;
                } else {
               
                    $allData[] = ['message' => 'Tabela ' . $tableName . ' nie istnieje'];
                }
            }
        
            return response()->json($allData);
        } else {
       
            return response()->json(['message' => 'Tabela "clubs" nie istnieje'], 404);
        }
    }

}
