<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangingUserRequest;
use App\Http\Requests\RelationRequest;
use App\Http\Requests\TableRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Clubs;
use App\Models\Relations;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

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

    public function fetchclubs() {
        try {
             /** @var \App\Models\Clubs $user */
            $clubs = Clubs::all();
    
            foreach ($clubs as $club) {
                $tableName = $club->url;
    
                
                if (Schema::hasTable($tableName)) {
                    $club->existsTable = true;
                } else {
                    $club->existsTable = false;
                }
            }
    
            return response()->json($clubs);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function createtable(TableRequest $request) {
        $tableName=$request->url;
        $name=$request->name;
        $url_logo=$request->url_logo;
        Schema::create($tableName, function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->timestamps(); 
        });
        
        DB::table($tableName)->insert([
            'name' => $name,
            'url_logo' => $url_logo,
        ]);
    }

    public function showrealtiontable(TableRequest $request) {
        $tableName=$request->url;

        if (Schema::hasTable($tableName)) {
           
            $data = DB::table($tableName)->get();
    
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Tabela nie istnieje'], 404);
        }
      
    }

    public function removeralation(RelationRequest $request) {
        $tableName=$request->url;
        $name=$request->name;
        if (Schema::hasTable($tableName)) {
           
                DB::table($tableName)
                    ->where('positive', $name)
                    ->orWhere('negative', $name)
                    ->update([
                        'positive' => null,
                        'negative' => null,
            ]);

        } else {
            return response()->json(['message' => 'Tabela nie istnieje'], 404);
        }
      
    }
    
    public function shownameslubswithnorealtions(RelationRequest $request) {
        $tableName = $request->url;
        $exists = DB::select("SHOW TABLES LIKE '{$tableName}'");
        if (!empty($exists)) {
            $namesWithoutRelations = DB::table('clubs')
                ->select('team')
                ->whereNotExists(function ($query) use ($tableName) {
                    $query->select(DB::raw(1))
                        ->from($tableName)
                        ->whereRaw("clubs.team = {$tableName}.positive OR clubs.team = {$tableName}.negative OR clubs.team = {$tableName}.name");
                })
                ->get()
                ->pluck('team');
    
            return response()->json(['names_without_relations' => $namesWithoutRelations]);
        } else {
            return response()->json(['message' => 'Tabela nie istnieje'], 404);
        }
      
    }

    public function addpositiverelation(RelationRequest $request) {
        $tableName=$request->url;
        $name=$request->name;
                    DB::table($tableName)->insert([
                        'positive' => $name,
                    ]);
    }

    public function addnegativerelation(RelationRequest $request) {
        $tableName=$request->url;
        $name=$request->name;
                    DB::table($tableName)->insert([
                        'negative' => $name,
                    ]);
    }
    

}
