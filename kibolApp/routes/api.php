<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::get('/clubs', [ClubController::class, 'index']);
Route::get('/clubsname', [ClubController::class, 'name']);
Route::get('/clubs/{id}', [ClubController::class, 'show']);
Route::post('/clubs', [ClubController::class, 'store']);
Route::put('/clubs/{id}', [ClubController::class, 'update']);
Route::delete('/clubs/{id}', [ClubController::class, 'destroy']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/clubs', [MapController::class, 'fetchclubs']);
Route::get('/clubpage/{clubName}', [ClubController::class, 'getClubData']);
Route::get('/getClubName/{clubId}', [ClubController::class, 'getClubName']);
Route::get('/clubswithnegative', [MapController::class, 'fetchclubswithnegative']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/getCurrentUser', [UserController::class, 'getCurrentUser']);
    Route::post('/changeEmail/{id}', [UserController::class, 'changeEmail']);
    Route::post('/changeName/{id}', [UserController::class, 'changeName']);
    Route::post('/changePassword/{id}', [UserController::class, 'changePassword']);
    Route::post('/changeClub/{id}', [UserController::class, 'changeClub']);
    Route::post('/addToFavorites', [UserController::class, 'addToFavorites']);
    Route::post('/removeFromFavorites', [UserController::class, 'removeFromFavorites']);
    Route::get('/getUserFavorites', [UserController::class, 'getUserFavorites']);
    Route::get('/getlongandlatforborders',[MapController::class,'getLngAndLat']);
});




    Route::post('/getusers', [AdminController::class, 'showusers']);
    Route::post('/addusers', [AdminController::class, 'store']);
    Route::put('/edituser/{id}', [AdminController::class, 'update']);
    Route::delete('/deleteuser/{id}', [AdminController::class, 'destroy']);
    Route::get('/getclubs', [AdminController::class, 'fetchclubs']);
    Route::post('/creattable', [AdminController::class, 'createtable']);
    Route::get('/getrealtiontable', [AdminController::class, 'showrealtiontable']);
    Route::post('/removerelation', [AdminController::class, 'removeralation']);
    Route::get('/getnameclubsiwthnorealtions', [AdminController::class, 'shownameslubswithnorealtions']);
    Route::post('/addpositiverelation', [AdminController::class, 'addpositiverelation']);
    Route::post('/addnegativerelation', [AdminController::class, 'addnegativerelation']);
   