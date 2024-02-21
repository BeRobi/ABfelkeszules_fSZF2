<?php

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\TravelController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('airlines', [AirlineController::class, 'index']);
Route::get('airlines/{id}', [AirlineController::class, 'show']);
Route::post('airlines', [AirlineController::class, 'store']);
Route::put('airlines/{id}', [AirlineController::class, 'update']);

Route::get('ossz/{id}', [TravelController::class, 'osszesJarat']);
Route::get('sajat', [TravelController::class, 'sajatJarat']);