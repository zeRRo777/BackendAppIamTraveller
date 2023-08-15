<?php

use App\Http\Controllers\Api\AttractionController;
use App\Http\Controllers\Api\CityAttractionsController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\PrizeController;
use App\Http\Controllers\User\UserController;
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

Route::middleware('auth:sanctum')->group(function(){
    Route::post('users/{id}/changeInfo', [UserController::class, 'updateUser']);
    Route::post('prizeUser', PrizeController::class);
});

Route::prefix('cities')->group(function() {
    Route::get('/', [CityController::class, 'getCities']);
    Route::get('{id}/attractions', CityAttractionsController::class);
    Route::get('{id}', [CityController::class, 'getCity']);
});

Route::prefix('attractions')->group(function() {
    Route::get('{id}', [AttractionController::class, 'getAttraction']);
    Route::get('{id}/images', [AttractionController::class, 'getAttractionImages']);
});

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('users/{id}', [UserController::class, 'getUser']);

