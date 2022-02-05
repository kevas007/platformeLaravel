<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
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

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'log']);
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create']);



Route::get('/entreprise', [App\Http\Controllers\EntrepriseController::class, 'index'])->middleware('auth:sanctum');
Route::get('/taches', [App\Http\Controllers\TacheController::class,'showTache'])->middleware('auth:sanctum');
Route::put('/taches/{id}', [App\Http\Controllers\TacheController::class,'update'])->middleware('auth:sanctum');
Route::post('/entreprise', [App\Http\Controllers\EntrepriseController::class, 'store'])->middleware('auth:sanctum');
//Route::post('/out', [App\Http\Controllers\Auth\LoginController::class, 'deconnection'])->middleware('auth:sanctum');
Route::get('/message', [App\Http\Controllers\MessageController::class, 'massages'])->middleware('auth:sanctum');
Route::post('/message/{id}', [App\Http\Controllers\MessageController::class, 'store'])->middleware('auth:sanctum');
Route::put('/entreprise/{id}', [App\Http\Controllers\EntrepriseController::class, 'update'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->post('/out', function (Request $request)
{

    Auth::user()->currentAccessToken()->delete();
    return response()->json(
        [
            'message' => 'Vous êtes déconnecté avec succès',
            'status' => 200,
        ],
        200 ,
        [
            'Content-Type' => 'application/json;charset=UTF-8',
            'Charset' => 'utf-8',
        ],
        JSON_UNESCAPED_UNICODE
    );
});
Broadcast::routes(['middleware' => 'web']);

Broadcast::routes(['middleware' => "auth:sanctum"]);

require base_path('routes/channels.php');
