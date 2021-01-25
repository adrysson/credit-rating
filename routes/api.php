<?php

use App\Http\Controllers\Api\V1\CitizenAssetController;
use App\Http\Controllers\Api\V1\CitizenController;
use App\Http\Controllers\Api\V1\PersonController;
use App\Http\Controllers\Api\V1\PersonDebtController;
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

Route::group(['middleware' => 'auth:api'], function () {
    Route::prefix('v1')->group(function () {
        Route::apiResource('persons', PersonController::class)->except('index');
        Route::apiResource('persons.debts', PersonDebtController::class);
        Route::apiResource('citizens', CitizenController::class)->except('index');
        Route::apiResource('citizens.assets', CitizenAssetController::class);
    });
});
