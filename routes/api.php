<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

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

Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/sessions', function (Request $request) {
    return $request->user()->tokens;
});

Route::post('/login', [Api\AuthController::class, 'login']);
Route::middleware('auth:sanctum')->delete('/logout', [Api\AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->get('/survey', [Api\SurveyController::class, 'index']);
Route::middleware('auth:sanctum')->get('/survey/{group}', [Api\SurveyController::class, 'state']);
Route::middleware('auth:sanctum')->post('/survey/{group}/{question}', [Api\SurveyController::class, 'update']);
