<?php

namespace App\Http\Controllers;


use App\Models\Clubs;






class MapController extends Controller
{
    public function fetchclubs() {
        /** @var \App\Models\Clubs $user */
        
        $profiles=Clubs::all();
        $response = response()->json($profiles);

        return $response;
    }

}
