<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\SignupRequest;

class AuthController extends Controller
{
    public function register(SignupRequest $request) {
        $data=$request->validated();
        /** @var \App\Models\User $user */
        $user = User::create([
            'name'=>$data['name'],
            'email'=> $data['email'],
            'password'=>bcrypt($data['password']),
        ]);
        $user->sendEmailVerificationNotification();

        $res=([
            'user'=>$user,
        ]);
        return response($res);
    }

    public function login(LoginRequest $request) {
        $credentials=$request->validated();
        if(!Auth::attempt($credentials)){
            return response([
                'message'=>'Something wrong'
            ]);
        }
        /** @var User $user */
        $user=Auth::user();
        $token=$user->createToken((int)['id' => (String)$user->id])->plainTextToken;
        $res=([
            'user'=>$user,
            'token'=>$token
        ]);
        return response($res);
    }


    public function logout(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = $request->user();
        $user->currentAccessToken()->delete;
        return response('', 204);
    }
}
