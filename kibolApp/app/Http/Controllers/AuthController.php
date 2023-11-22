<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request) {
        $user = User::create([
            'name' => $request->input('name'),
            'enamil' => $request->input('email'),
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
        $user = Auth::user();

        //$token = $user->createToken('ACCESS_TOKEN')->plainTextToken;

        return $user;
    }

    public function user() {
        return 'Authenticated user';
    }
}
