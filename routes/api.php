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

Route::controller(Api\TokenController::class)->group(function () {
    Route::get('/token', 'index')->middleware('auth:sanctum');
    Route::post('/token', 'store');
    Route::delete('/token', 'destroy')->middleware('auth:sanctum');
});

// Route::middleware('auth:sanctum')->get('/survey', [Api\SurveyController::class, 'index']);
// Route::middleware('auth:sanctum')->get('/survey/{group}', [Api\SurveyController::class, 'state']);
// Route::middleware('auth:sanctum')->post('/survey/{group}/{question}', [Api\SurveyController::class, 'update']);

Route::middleware('auth:sanctum')->controller(Api\SurveyController::class)->group(function () {
    Route::get('/survey', 'index');
    Route::get('/survey/{group}', 'state');
    Route::post('/survey/{group}/{question}', 'update');
});
