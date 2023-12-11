<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ClubController extends Controller
{
    public function getClubData($clubName)
    {
        if (!Schema::hasTable($clubName)) {
            return response()->json(['error' => 'Table not found'], 404);
        }

        try {
            $clubData = DB::table($clubName)->get();

            $filteredClubData = $clubData->map(function ($club) {
                return array_filter((array)$club, function ($value) {
                    return $value !== null;
                });
            });

            if ($filteredClubData->isEmpty()) {
                return response()->json(['error' => 'Club data not found'], 404);
            }

            return response()->json($filteredClubData);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}