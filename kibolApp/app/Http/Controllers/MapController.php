<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorderRequest;
use App\Http\Requests\NegativeRequest;
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
                        ->get()
                        ->toArray();
    
                   
                    
                   
                        $club->urlData = $urlData;
                    
                }
            }
    
          
            return response()->json($clubs);
        } catch (\Exception $e) {
        
            return response()->json(['error' => 'Wystąpił błąd podczas pobierania danych.']);
        }
    }

    public function fetchclubswithnegative(NegativeRequest $something) {
        $nameuserclub = $something;

        
        $userClubUrl = DB::table('clubs')
            ->select('team','url')
            ->where('team', $nameuserclub)
            ->get();
        return($userClubUrl);
            $negativeRelations = DB::table($userClubUrl)
            ->select('negative')
            ->whereNotNull('negative')
            ->get()
            ->toArray();
            
        
        $clubs = DB::table('clubs')
            ->get();   
        
        foreach ($clubs as $club) {
            $tableName = $club->url;
        
            if (Schema::hasTable($tableName)) {
              
                $urlData = DB::table($tableName)
                    ->select('lat', 'lng', 'name')  
                    ->whereNotNull('lat')
                    ->whereNotNull('lng')
                    ->get()
                    ->toArray();
        
               
                $clubsWithNegativeRelations = array_filter($urlData, function ($item) use ($negativeRelations) {
                    return in_array($item->name, $negativeRelations);
                });
        
                if (!empty($clubsWithNegativeRelations)) {
    
                    $club->urlData = $urlData;
                }
            }
        }
        
        return response()->json($clubs);


    }
}


