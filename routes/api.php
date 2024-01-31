<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\DistrictController;
use App\Http\Controllers\api\v1\MicroDistrictController;
use App\Http\Controllers\api\v1\OrientController;
use App\Http\Controllers\api\v1\RentApartmentController;

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


Route::apiResource('v1/district',DistrictController::class);
Route::apiResource('v1/microdistrict',MicroDistrictController::class);
Route::apiResource('v1/orient',OrientController::class);
Route::apiResource('v1/rentapartment',RentApartmentController::class);
