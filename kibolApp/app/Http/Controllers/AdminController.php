<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangingUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Clubs;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showusers()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user, 201);
    }

    public function update(ChangingUserRequest $request, $id)
    {
        $user = User::find($id);
        $name = $user->name;
        $email = $user->email;
        $password = $user->password;

        if (!$user) {
            return response()->json(['message' => 'Użytkownik nie znaleziony'], 404);
        }
    
        $dataToUpdate = [];
    
        
        if ($request->filled('name') && $request->name !== $user->name) {
            $dataToUpdate['name'] = $request->name;
        }
    
        if ($request->filled('email')) {
            $existingUser = User::where('email', $request->email)->first();
        
            if (!$existingUser || $existingUser->id === $user->id) {
                $dataToUpdate['email'] = $request->email;
            } else {
                return response()->json(['error' => 'Podany email jest już zajęty.'], 422);
            }
        }
    
        if ($request->filled('password')) {
          
            if (Hash::check($request->password, $user->password) === false) {
                $dataToUpdate['password'] = Hash::make($request->password);
            }
        }
    
       
        if (!empty($dataToUpdate)) {
            $user->update($dataToUpdate);
        }
    
        return response()->json($user);
    }


    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Użytkownik nie znaleziony'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Użytkownik usunięty']);
    }

}
