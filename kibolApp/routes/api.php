<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
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

 /* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/clubs', [MapController::class, 'fetchclubs']);
Route::get('/clubpage/{clubName}', [ClubController::class, 'getClubData']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/getCurrentUser', [UserController::class, 'getCurrentUser']);
    Route::put('/changeEmail', [UserController::class, 'changeEmail']);
    Route::put('/changeName', [UserController::class, 'changeName']);
    Route::put('/changePassword', [UserController::class, 'changePassword']);
    //Route::put('/changeClub', [UserController::class, 'changeClub']);
});
Route::post('/send-email', [EmailController::class, 'sendEmail']);
