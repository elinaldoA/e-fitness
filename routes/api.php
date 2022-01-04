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

Route::prefix('v1')->group(function () {

    Route::post('/register', 'efitness\Api\V1\Nutricionistas\Auth\RegisterController@register');
    Route::post('/login', 'efitness\Api\V1\Nutricionistas\Auth\LoginController@login');
    Route::post('/password/forgot', 'efitness\Api\V1\Nutricionistas\Auth\ForgotPasswordController@getResetToken');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
