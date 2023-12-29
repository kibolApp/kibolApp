<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)
        ->redirect()
        ->header('Access-Control-Allow-Origin', 'http://localhost:3000') 
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    public function callback($provider){
        $user = Socialite::driver($provider)->user();
        dd($user);
    }
}
