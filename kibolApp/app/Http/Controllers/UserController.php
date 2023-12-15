<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeEmailRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChangeNameRequest;
use App\Http\Requests\ChangePasswordRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Użytkownik nie znaleziony'], 404);
        }

        return response()->json($user);
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
    
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return response()->json(['message' => 'Użytkownik nie znaleziony'], 404);
        }
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
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

    public function getCurrentUser()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return response()->json(['user' => $user], 200);
        }

        return response()->json(['message' => 'Użytkownik niezalogowany'], 401);
    }

public function changeEmail(ChangeEmailRequest $request, $id)
{
    $user = User::find($id);

    if ($user->email !== $request->oldEmail) {
        return response()->json(['message' => 'Stary adres email jest nieprawidłowy.'], 400);
    }

    if ($request->newEmail == $request->confirmEmail) {

    $user->update([
        'email' => $request->newEmail,
     ]);
    } else  return response()->json(['message' => 'Nieprawidłowe potwierdzenie adresu email.'], 400);

    return response()->json($user);
}

public function changeName(ChangeNameRequest $request, $id)
{
    $user = User::find($id);

    if ($user->name !== $request->oldName) {
        return response()->json(['message' => 'Stary nazwa użytkownika jest nieprawidłowa.'], 400);
    }

    $user->update([
        'name' => $request->newName,
    ]);

    return response()->json($user);
}

public function changePassword(ChangePasswordRequest $request, $id)
{
    $user = User::find($id);

    if ($user->password !== $request->oldPassword) {
        return response()->json(['message' => 'Stare hasło jest nieprawidłowe.'], 400);
    }

    if ($request->newPassword == $request->confirmPassword) {

    $user->update([
        'password' => $request->newPassword,
     ]);
    } else  return response()->json(['message' => 'Nieprawidłowe potwierdzenie hasła.'], 400);

    return response()->json($user);
}

public function changeClub()
{
    return;
}
}
