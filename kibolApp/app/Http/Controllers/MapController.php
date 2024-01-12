<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorderRequest;
use App\Models\Clubs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MapController extends Controller
{
    public function fetchclubs() {
        try {
            $clubs = DB::table('clubs')
                ->get();
    
            foreach ($clubs as $club) {
                $tableName = $club->url;
    
        
                if (Schema::hasTable($tableName)) {
                    $urlData = DB::table($tableName)
                        ->select('lat', 'lng')
                        ->whereNotNull('lat')
                        ->whereNotNull('lng')
                        ->get();
    
                   
                    
                   
                        $club->urlData = $urlData;
                    
                }
            }
    
          
            return response()->json($clubs);
        } catch (\Exception $e) {
        
            return response()->json(['error' => 'Wystąpił błąd podczas pobierania danych.']);
        }
    }


}
