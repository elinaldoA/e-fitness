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
    
    Route::prefix('nutricionista')->group(function () {
        // Auth Nutricionistas
        Route::middleware('api')->group(function () {
            Route::post('/password/forgot', 'efitness\Api\V1\Nutricionistas\Auth\ForgotPasswordController@getResetToken')->name('nutricionistas.forgot.password');
            Route::post('/register', 'efitness\Api\V1\Nutricionistas\Auth\RegisterController@register');
            Route::post('/login', 'efitness\Api\V1\Nutricionistas\Auth\LoginController@login');
        });
        Route::get('email/verify', 'efitness\Api\V1\Nutricionistas\Auth\VerificationController@show')->name('nutricionistas.verification.notice');
        Route::get('email/verify/{id}/{hash}', 'efitness\Api\V1\Nutricionistas\Auth\VerificationController@verify')->name('nutricionistas.verification.verify');
        Route::post('email/resend', 'efitness\Api\V1\Nutricionistas\Auth\VerificationController@resend')->name('nutricionistas.verification.resend');
    });
    
    Route::prefix('professor')->group(function () {
        // Auth Professores
        Route::middleware('api')->group(function () {
            Route::post('/password/forgot', 'efitness\Api\V1\Professores\Auth\ForgotPasswordController@getResetToken')->name('professores.forgot.password');
            Route::post('/register', 'efitness\Api\V1\Professores\Auth\RegisterController@register');
            Route::post('/login', 'efitness\Api\V1\Professores\Auth\LoginController@login');
        });
        Route::get('email/verify', 'efitness\Api\V1\Professores\Auth\VerificationController@show')->name('professores.verification.notice');
        Route::get('email/verify/{id}/{hash}', 'efitness\Api\V1\Professores\Auth\VerificationController@verify')->name('professores.verification.verify');
        Route::post('email/resend', 'efitness\Api\V1\Professores\Auth\VerificationController@resend')->name('professores.verification.resend');
    });
    
    Route::prefix('recepcao')->group(function () {
        // Auth Recepcao
        Route::middleware('api')->group(function () {
            Route::post('/password/forgot', 'efitness\Api\V1\Recepcao\Auth\ForgotPasswordController@getResetToken')->name('recepcoes.forgot.password');
            Route::post('/register', 'efitness\Api\V1\Recepcao\Auth\RegisterController@register');
            Route::post('/login', 'efitness\Api\V1\Recepcao\Auth\LoginController@login');
        });
        Route::get('email/verify', 'efitness\Api\V1\Recepcao\Auth\VerificationController@show')->name('recepcoes.verification.notice');
        Route::get('email/verify/{id}/{hash}', 'efitness\Api\V1\Recepcao\Auth\VerificationController@verify')->name('recepcoes.verification.verify');
        Route::post('email/resend', 'efitness\Api\V1\Recepcao\Auth\VerificationController@resend')->name('recepcoes.verification.resend');
    });
    
    Route::prefix('alunos')->group(function () {
        // Auth Alunos
        Route::middleware('api')->group(function () {
            Route::post('/password/forgot', 'efitness\Api\V1\Alunos\Auth\ForgotPasswordController@getResetToken')->name('alunos.forgot.password');
            Route::post('/register', 'efitness\Api\V1\Alunos\Auth\RegisterController@register');
            Route::post('/login', 'efitness\Api\V1\Alunos\Auth\LoginController@login');
        });
        Route::get('email/verify', 'efitness\Api\V1\Alunos\Auth\VerificationController@show')->name('alunos.verification.notice');
        Route::get('email/verify/{id}/{hash}', 'efitness\Api\V1\Alunos\Auth\VerificationController@verify')->name('alunos.verification.verify');
        Route::post('email/resend', 'efitness\Api\V1\Alunos\Auth\VerificationController@resend')->name('alunos.verification.resend');
    });
});
