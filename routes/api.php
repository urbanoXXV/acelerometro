<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SetDataController;
use App\Http\Controllers\Api\GetDataController;

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

Route::apiResource('GetData', GetDataController::class);
Route::apiResource('SetData', SetDataController::class);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
