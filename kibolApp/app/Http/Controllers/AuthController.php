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
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        return $user;
    }

    public function login(Request $request) {
        if( Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => 'Something went wrong'
            ], Response::HTTP_UNAUTHORIZED);
        }
           /** @var User $user */
        $user = Auth::user();

        $token = $user->createToken('ACCESS_TOKEN')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24);
        return response([
            'message' => 'success'
        ])->withCookie($cookie);
    }

    public function user() {
        return Auth::user();
    }

    public function logout() {
        $cookie = Cookie::forget('jwt');
        return response([
            'message' => 'Success'
        ])->withCookie($cookie);
    }
}
