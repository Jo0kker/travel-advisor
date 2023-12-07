<?php

use App\Http\Controllers\AuthController;
use App\Rest\Controllers\ActivityController;
use App\Rest\Controllers\AddressController;
use App\Rest\Controllers\CityController;
use App\Rest\Controllers\CountryController;
use App\Rest\Controllers\SeasonController;
use App\Rest\Controllers\ThematicController;
use App\Rest\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Lomkit\Rest\Facades\Rest;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Rest::resource('users', UsersController::class);
Rest::resource('thematics', ThematicController::class);
Rest::resource('seasons', SeasonController::class);
Rest::resource('countries', CountryController::class);
Rest::resource('cities', CityController::class);
Rest::resource('addresses', AddressController::class);
Rest::resource('activities', ActivityController::class);
