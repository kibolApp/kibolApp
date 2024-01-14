<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider){
        $socialite = Socialite::driver($provider);
        $authUrl = $socialite->redirect()->getTargetUrl();

      
        return response()->json(['authUrl' => $authUrl]);
       
    }


    public function callback( $provider)
    {
        $Socialuser=Socialite::driver($provider)->stateless()->user();
        
        if($provider=='github'){
            $user = User::updateOrCreate([
                'provider_id' => $Socialuser->id,
                'provider'=> $provider,
            ], [
                'name' => $Socialuser->nickname,
                'email' => $Socialuser->email,
                'provider_token' => $Socialuser->token,
            ]);
        }

        if($provider=='google'){

        /** @var User $user */
        $user = User::updateOrCreate([
            'provider_id' => $Socialuser->id,
            'provider'=> $provider,
        ], [
            'name' => $Socialuser->name,
            'email' => $Socialuser->email,
            'provider_token' => $Socialuser->token,
        ]);
    }
    $token = $user->createToken('access_token')->plainTextToken;
    $res=([
        'user'=>$user,
        'token'=>$token
    ]);

    if (Auth::check()) {
        return redirect('http://kibolapp.cloud/wait?token=' . $token . '&user=' . urlencode(json_encode($user)));
    }
}
}
