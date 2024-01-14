<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubRequest;
use App\Models\Clubs;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Clubs::all();
        return response()->json($clubs);
    }
    public function name()
{
    $teams = Clubs::pluck('team')->toArray();
    return response()->json($teams);
}

    public function show($id)
    {
        $club = Clubs::find($id);

        if (!$club) {
            return response()->json(['message' => 'Klub nie znaleziony'], 404);
        }

        return response()->json($club);
    }

    public function store(ClubRequest $request)
    {
        $club = Clubs::create([
            'team' => $request->team,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'address' => $request->address,
            'url_logo' => $request->url_logo,
            'url'=>$request->url,
        ]);

        return response()->json($club, 201);
    }

    public function update(ClubRequest $request, $id)
    {
        $club = Clubs::find($id);

        if (!$club) {
            return response()->json(['message' => 'Klub nie znaleziony'], 404);
        }

        $club->update([
            'team' => $request->team,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'address' => $request->address,
            'url_logo' => $request->url_logo,
        ]);

        return response()->json($club);
    }

    public function destroy($id)
    {
        $club = Clubs::find($id);

        if (!$club) {
            return response()->json(['message' => 'Klub nie znaleziony'], 404);
        }

        $club->delete();

        return response()->json(['message' => 'Klub usunięty']);
    }

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
