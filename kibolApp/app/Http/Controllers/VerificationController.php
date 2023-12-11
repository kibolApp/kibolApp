<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify($user_id, Request $request) {
        if (!$request->hasValidSignature()) {
            return response()->json(["msg" => "Invalid url provided"], 401);
        }
        $user = User::findOrFail($user_id);
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        } else {
            return response()->json([
                "status" => 400,
                "message" => "Email already verified"
            ], 400);
        }

        return response()->json([
            "status" => 200,
            "message" => "Your email $user->email soccessfully verified"
        ], 200);
    }
}
