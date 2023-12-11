<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SignupRequest;
use App\Mail\UserVerification;
use Illuminate\Support\Facades\Mail;

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

        if($user) {
            try {
                Mail::mailer('smtp')->to($user->email)->send(new UserVerification($user));

                return response()->json([
                    'status' => 200,
                    'message' => "Registered, verify your email address to login",
                ], 200);
            } catch (\Exception $err) {
                //$user->delete();
                return response()->json([
                    'status' => 500,
                    'message' => "Something went wrong",
                ], 500);
            }
        }

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
