<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeEmailRequest;
use App\Models\User;
use App\Models\Clubs;
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
            'role' => $request->role,

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
            'role' => $request->role,
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
            $club = $user->club;
            $role = $user->role;

            return response()->json(['user' => $user, 'club' => $club, 'role' => $role ], 200);
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

    if (!Hash::check($request->oldPassword, $user->password)) {
        return response()->json(['message' => 'Stare hasło jest nieprawidłowe.'], 400);
    }

    if ($request->newPassword == $request->confirmPassword) {

    $user->update([
        'password' => Hash::make($request->newPassword),
     ]);
    } else  return response()->json(['message' => 'Nieprawidłowe potwierdzenie hasła.'], 400);

    return response()->json($user);
}

public function changeClub(Request $request, $id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    $newClubName = $request->input('newClub');

    $club = Clubs::where('team', $newClubName)->first();

    if (!$club) {
        return response()->json(['message' => 'Club not found'], 404);
    }

    $user->update([
        'team_id' => $club->id,
    ]);

    return response()->json($user);

}
public function addToFavorites(Request $request)
{
    $userId = auth()->id();
    $clubId = $request->input('club_id');

    $user = User::find($userId);
    $club = Clubs::find($clubId);

    if ($user && $club) {
        $user->favoriteClubs()->attach($club->id);
        return response()->json(['message' => 'Club added to favorites']);
    }

    return response()->json(['error' => 'User or Club not found'], 404);
}

public function removeFromFavorites(Request $request)
{
    $userId = auth()->id();
    $clubId = $request->input('club_id');

    $user = User::find($userId);
    $club = Clubs::find($clubId);

    if ($user && $club) {
        $user->favoriteClubs()->detach($club->id);
        return response()->json(['message' => 'Club removed from favorites']);
    }

    return response()->json(['error' => 'User or Club not found'], 404);
}
public function getUserFavorites()
{
    $userId = Auth::id();
    $user = User::with('favoriteClubs')->find($userId);

    if ($user) {
        return response()->json(['favoriteClubs' => $user->favoriteClubs]);
    }

    return response()->json(['error' => 'User not found'], 404);
}
}
