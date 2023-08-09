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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('bidon2s', App\Http\Controllers\API\Bidon2APIController::class);

Route::resource('bidon3s', App\Http\Controllers\API\Bidon3APIController::class);

Route::resource('bidon30s', App\Http\Controllers\API\Bidon30APIController::class);

Route::resource('bidon23s', App\Http\Controllers\API\Bidon23APIController::class);