<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubRequest;
use App\Models\Clubs;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Clubs::all();
        return response()->json($clubs);
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
}
