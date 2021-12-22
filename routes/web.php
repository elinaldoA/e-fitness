<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Auth Recepcao
Route::prefix('recepcao')->group(function () {
    Route::get('login', 'efitness\Recepcao\AuthRecepcao\LoginController@showLoginForm')->name('efitness.recepcao.login');
    Route::post('login', 'efitness\Recepcao\AuthRecepcao\LoginController@login')->name('efitness.recepcao.login.submit');
    Route::post('logout', 'efitness\Recepcao\AuthRecepcao\LoginController@logout')->name('efitness.recepcao.logout');

    Route::get('register', 'efitness\Recepcao\AuthRecepcao\RegisterController@showRegistrationForm')->name('efitness.recepcao.register');
    Route::post('register', 'efitness\Recepcao\AuthRecepcao\RegisterController@register')->name('efitness.recepcao.submit');

    Route::get('password/confirm', 'efitness\Recepcao\AuthRecepcao\ConfirmPasswordController@showConfirmForm')->name('efitness.recepcao.password.confirm');
    Route::post('password/confirm', 'efitness\Recepcao\AuthRecepcao\ConfirmPasswordController@confirm')->name('efitness.recepcao.confirm.submit');

    Route::get('password/reset', 'efitness\Recepcao\AuthRecepcao\ForgotPasswordController@showLinkRequestForm')->name('efitness.recepcao.password.request');
    Route::post('password/email', 'efitness\Recepcao\AuthRecepcao\ForgotPasswordController@sendResetLinkEmail')->name('efitness.recepcao.password.email');

    Route::get('password/reset/{token}', 'efitness\Recepcao\AuthRecepcao\ResetPasswordController@showResetForm')->name('efitness.recepcao.password.reset');
    Route::post('password/reset', 'efitness\Recepcao\AuthRecepcao\ResetPasswordController@reset')->name('efitness.recepcao.password.update');

    Route::get('email/verify', 'efitness\Recepcao\AuthRecepcao\VerificationController@show')->name('efitness.recepcao.verification.notice');
    Route::get('email/verify/{id}/{hash}', 'efitness\Recepcao\AuthRecepcao\VerificationController@verify')->name('efitness.recepcao.verification.verify');
    Route::post('email/resend', 'efitness\Recepcao\AuthRecepcao\VerificationController@resend')->name('efitness.recepcao.verification.resend');
});
//Auth Nutricionistas
Route::prefix('nutricionistas')->group(function () {
    Route::get('login', 'efitness\Nutricionistas\AuthNutricionistas\LoginController@showLoginForm')->name('efitness.nutricionistas.login');
    Route::post('login', 'efitness\Nutricionistas\AuthNutricionistas\LoginController@login')->name('efitness.nutricionistas.login.submit');
    Route::post('logout', 'efitness\Nutricionistas\AuthNutricionistas\LoginController@logout')->name('efitness.nutricionistas.logout');

    Route::get('register', 'efitness\Nutricionistas\AuthNutricionistas\RegisterController@showRegistrationForm')->name('efitness.nutricionistas.register');
    Route::post('register', 'efitness\Nutricionistas\AuthNutricionistas\RegisterController@register')->name('efitness.nutricionistas.submit');

    Route::get('password/confirm', 'efitness\Nutricionistas\AuthNutricionistas\ConfirmPasswordController@showConfirmForm')->name('efitness.nutricionistas.password.confirm');
    Route::post('password/confirm', 'efitness\Nutricionistas\AuthNutricionistas\ConfirmPasswordController@confirm')->name('efitness.nutricionistas.confirm.submit');

    Route::get('password/reset', 'efitness\Nutricionistas\AuthNutricionistas\ForgotPasswordController@showLinkRequestForm')->name('efitness.nutricionistas.password.request');
    Route::post('password/email', 'efitness\Nutricionistas\AuthNutricionistas\ForgotPasswordController@sendResetLinkEmail')->name('efitness.nutricionistas.password.email');

    Route::get('password/reset/{token}', 'efitness\Nutricionistas\AuthNutricionistas\ResetPasswordController@showResetForm')->name('efitness.nutricionistas.password.reset');
    Route::post('password/reset', 'efitness\Nutricionistas\AuthNutricionistas\ResetPasswordController@reset')->name('efitness.nutricionistas.password.update');

    Route::get('email/verify', 'efitness\Nutricionistas\AuthNutricionistas\VerificationController@show')->name('efitness.nutricionistas.verification.notice');
    Route::get('email/verify/{id}/{hash}', 'efitness\Nutricionistas\AuthNutricionistas\VerificationController@verify')->name('efitness.nutricionistas.verification.verify');
    Route::post('email/resend', 'efitness\Nutricionistas\AuthNutricionistas\VerificationController@resend')->name('efitness.nutricionistas.verification.resend');
});
//Auth Professores
Route::prefix('professores')->group(function () {
    Route::get('login', 'efitness\Professores\AuthProfessores\LoginController@showLoginForm')->name('efitness.professores.login');
    Route::post('login', 'efitness\Professores\AuthProfessores\LoginController@login')->name('efitness.professores.login.submit');
    Route::post('logout', 'efitness\Professores\AuthProfessores\LoginController@logout')->name('efitness.professores.logout');

    Route::get('register', 'efitness\Professores\AuthProfessores\RegisterController@showRegistrationForm')->name('efitness.professores.register');
    Route::post('register', 'efitness\Professores\AuthProfessores\RegisterController@register')->name('efitness.professores.submit');

    Route::get('password/confirm', 'efitness\Professores\AuthProfessores\ConfirmPasswordController@showConfirmForm')->name('efitness.professores.password.confirm');
    Route::post('password/confirm', 'efitness\Professores\AuthProfessores\ConfirmPasswordController@confirm')->name('efitness.professores.confirm.submit');

    Route::get('password/reset', 'efitness\Professores\AuthProfessores\ForgotPasswordController@showLinkRequestForm')->name('efitness.professores.password.request');
    Route::post('password/email', 'efitness\Professores\AuthProfessores\ForgotPasswordController@sendResetLinkEmail')->name('efitness.professores.password.email');

    Route::get('password/reset/{token}', 'efitness\Professores\AuthProfessores\ResetPasswordController@showResetForm')->name('efitness.professores.password.reset');
    Route::post('password/reset', 'efitness\Professores\AuthProfessores\ResetPasswordController@reset')->name('efitness.recepcao.professores.update');

    Route::get('email/verify', 'efitness\Professores\AuthProfessores\VerificationController@show')->name('efitness.professores.verification.notice');
    Route::get('email/verify/{id}/{hash}', 'efitness\Professores\AuthProfessores\VerificationController@verify')->name('efitness.professores.verification.verify');
    Route::post('email/resend', 'efitness\Professores\AuthProfessores\VerificationController@resend')->name('efitness.professores.verification.resend');
});

Route::get('efitness/Administrativo/home', 'HomeController@index')->name('home');

Route::get('efitness/Administrativo/profile', 'ProfileController@index')->name('efitness.administrativo.profile');
Route::put('efitness/Administrativo/profile', 'ProfileController@update')->name('efitness.administrativo.profile.update');

Route::get('efitness/Administrativo/about', function () {
    return view('about');
})->name('about');

/*=========================Rotas Administrativo Cargos=======================================================================================================*/
Route::get('efitness/Administrativo/cargos/novo', 'efitness\Administrativo\Cargos\CargosController@create')->name('cargos.create');
Route::post('efitness/Administrativo/cargos/novo', 'efitness\Administrativo\Cargos\CargosController@store')->name('cargos.store');
Route::get('efitness/Administrativo/cargos/visualizar', 'efitness\Administrativo\Cargos\CargosController@index')->name('cargos');
Route::get('efitness/Administrativo/cargos/editar/{id}', 'efitness\Administrativo\Cargos\CargosController@edit');
Route::post('efitness/Administrativo/cargos/editar/{id}', 'efitness\Administrativo\Cargos\CargosController@update')->name('Alterar_cargo');
Route::get('efitness/Administrativo/cargos/excluir/{id}', 'efitness\Administrativo\Cargos\CargosController@delete');
Route::post('efitness/Administrativo/cargos/excluir/{id}', 'efitness\Administrativo\Cargos\CargosController@destroy')->name('excluir_cargo');
/*=========================Rotas Administrativo Funcionários=======================================================================================================*/
Route::get('efitness/Administrativo/funcionarios/novo', 'efitness\Administrativo\Funcionarios\FuncionariosController@create')->name('funcionarios.create');
Route::post('efitness/Administrativo/funcionarios/novo', 'efitness\Administrativo\Funcionarios\FuncionariosController@store')->name('funcionarios.store');
Route::get('efitness/Administrativo/funcionarios/visualizar', 'efitness\Administrativo\Funcionarios\FuncionariosController@index')->name('funcionarios');
Route::get('efitness/Administrativo/funcionarios/editar/{id}', 'efitness\Administrativo\Funcionarios\FuncionariosController@edit');
Route::post('efitness/Administrativo/funcionarios/editar/{id}', 'efitness\Administrativo\Funcionarios\FuncionariosController@update')->name('Alterar_funcionario');
Route::get('efitness/Administrativo/funcionarios/excluir/{id}', 'efitness\Administrativo\Funcionarios\FuncionariosController@delete');
Route::post('efitness/Administrativo/funcionarios/excluir/{id}', 'efitness\Administrativo\Funcionarios\FuncionariosController@destroy')->name('excluir_funcionario');
/*=========================Rotas Administrativo Professores=======================================================================================================*/
Route::get('efitness/Administrativo/professores/novo', 'efitness\Administrativo\Professores\ProfessoresController@create')->name('professores.create');
Route::post('efitness/Administrativo/professores/novo', 'efitness\Administrativo\Professores\ProfessoresController@store')->name('professores.store');
Route::get('efitness/Administrativo/professores/visualizar', 'efitness\Administrativo\Professores\ProfessoresController@index')->name('professores');
Route::get('efitness/Administrativo/professores/editar/{id}', 'efitness\Administrativo\Professores\ProfessoresController@edit');
Route::post('efitness/Administrativo/professores/editar/{id}', 'efitness\Administrativo\Professores\ProfessoresController@update')->name('Alterar_professor');
Route::get('efitness/Administrativo/professores/excluir/{id}', 'efitness\Administrativo\Professores\ProfessoresController@delete');
Route::post('efitness/Administrativo/professores/excluir/{id}', 'efitness\Administrativo\Professores\ProfessoresController@destroy')->name('excluir_professor');
/*=========================Rotas Administrativo Nutricionistas=======================================================================================================*/
Route::get('efitness/Administrativo/nutricionistas/novo', 'efitness\Administrativo\Nutricionistas\NutricionistasController@create')->name('nutricionistas.create');
Route::post('efitness/Administrativo/nutricionistas/novo', 'efitness\Administrativo\Nutricionistas\NutricionistasController@store')->name('nutricionistas.store');
Route::get('efitness/Administrativo/nutricionistas/visualizar', 'efitness\Administrativo\Nutricionistas\NutricionistasController@index')->name('nutricionistas');
Route::get('efitness/Administrativo/nutricionistas/editar/{id}', 'efitness\Administrativo\Nutricionistas\NutricionistasController@edit');
Route::post('efitness/Administrativo/nutricionistas/editar/{id}', 'efitness\Administrativo\Nutricionistas\NutricionistasController@update')->name('Alterar_nutricionista');
Route::get('efitness/Administrativo/nutricionistas/excluir/{id}', 'efitness\Administrativo\Nutricionistas\NutricionistasController@delete');
Route::post('efitness/Administrativo/nutricionistas/excluir/{id}', 'efitness\Administrativo\Nutricionistas\NutricionistasController@destroy')->name('excluir_nutricionista');
/*=========================Rotas Administrativo Alunos=======================================================================================================*/
Route::get('efitness/Administrativo/alunos/novo', 'efitness\Administrativo\Alunos\AlunosController@create')->name('alunos.create');
Route::post('efitness/Administrativo/alunos/novo', 'efitness\Administrativo\Alunos\AlunosController@store')->name('alunos.store');
Route::get('efitness/Administrativo/alunos/visualizar', 'efitness\Administrativo\Alunos\AlunosController@index')->name('alunos');
Route::get('efitness/Administrativo/alunos/editar/{id}', 'efitness\Administrativo\Alunos\AlunosController@edit');
Route::post('efitness/Administrativo/alunos/editar/{id}', 'efitness\Administrativo\Alunos\AlunosController@update')->name('Alterar_aluno');
Route::get('efitness/Administrativo/alunos/excluir/{id}', 'efitness\Administrativo\Alunos\AlunosController@delete');
Route::post('efitness/Administrativo/alunos/excluir/{id}', 'efitness\Administrativo\Alunos\AlunosController@destroy')->name('excluir_aluno');