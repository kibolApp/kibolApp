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
        $nameuserclub = $something->name;

        $userClubUrl = DB::table('clubs')
            ->select('url')
            ->where('team', $nameuserclub)
            ->value('url');
        
        $negativeRelations = DB::table($userClubUrl)
            ->select('negative')
            ->whereNotNull('negative')
            ->get()
            ->pluck('negative')
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
        
            
                $clubName = $club->team;
        
                if (in_array($clubName, $negativeRelations)) {
                  
                    $club->hasNegativeRelation = true;
                    $club->urlData = $urlData;
                } else {
                   
                    $club->hasNegativeRelation = false;
                }
        
            }
        }
        
        return response()->json($clubs);

    }
}


