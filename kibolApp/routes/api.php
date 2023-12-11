<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/register', [AuthController::class, 'register']);
Route::get('email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');


Route::post('/login', [AuthController::class, 'login']);
Route::get('/clubs', [MapController::class, 'fetchclubs']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

