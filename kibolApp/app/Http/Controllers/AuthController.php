<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request) {
        $data=$request->validated();

        $user = User::create([
            'name' =>  $data['name'],
            'email' =>   $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        $token = $user->createToken('ACCESS_TOKEN')->plainTextToken;

        $res=([
            'user'=>$user,
            'token'=>$token
        ]);
        return response($res);
    }

    public function login(Request $request) {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => 'Something went wrong'
            ], Response::HTTP_UNAUTHORIZED);
        }

        /** @var User $user */
        $user = Auth::user();

        $token = $user->createToken('ACCESS_TOKEN')->plainTextToken;

        $cookie = cookie('token', $token, 60 * 24);

        return response([
            'message' => $token
        ])->withCookie($cookie);
    }

    public function user() {
        return Auth::user();
    }

    public function logout() {
        $cookie = Cookie::forget('token');

        return response([
            'message' => 'Success'
        ])->withCookie($cookie);
    }
}
