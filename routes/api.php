<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ReportController;
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

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->get('/reports/me', [ReportController::class, 'myReports']);
Route::middleware('auth:sanctum')->get('/reports/{report}', [ReportController::class, 'getReport']);
Route::middleware('auth:sanctum')->get('/reports', [ReportController::class, 'findAll']);
Route::post('/reports', [ReportController::class, 'store']);
Route::get('/reports/{report}/getAudio', [ReportController::class, 'getAudio']);