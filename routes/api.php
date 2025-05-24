<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\Api\ZekrController;
use App\Http\Controllers\Api\DuaController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/azkar', [ZekrController::class, 'index']);

Route::get('/duas', [DuaController::class, 'index']);

 
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\Api\ProfileController;

Route::middleware('auth:sanctum')->put('/profile', [ProfileController::class, 'update']);

Route::get('/adkar', function () {
    return \App\Models\Adkar::all();
});

 use App\Http\Controllers\AdkarController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/adkar/{id}/like', [AdkarController::class, 'like']);
    Route::post('/adkar/{id}/repeat', [AdkarController::class, 'repeat']);
});

use App\Http\Controllers\AdkarUserInteractionController;
// هذا يسمح لأي شخص بإرسال التفاعل حتى بدون تسجيل الدخول
Route::post('/adkar/interact', [AdkarUserInteractionController::class, 'updateInteraction']);

 

Route::middleware('auth:sanctum')->get('/favorites', [AdkarController::class, 'favorites']);
Route::middleware('auth:sanctum')->delete('/favorites/{adkar}',[AdkarUserInteractionController::class, 'unlike']);

Route::middleware('auth:sanctum')->delete('/favorites/{adkarId}', [AdkarUserInteractionController::class, 'removeFavorite']);

Route::middleware('auth:sanctum')->post('/adkar/interact', [AdkarUserInteractionController::class, 'updateInteraction']);

 

Route::get('/duas', [DuaController::class, 'index']);








 








