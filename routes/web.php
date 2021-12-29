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
/*=========================Rotas Painel Administrativo=======================================================================================================*/
Route::get('efitness/Administrativo/home', 'HomeController@index')->name('home');
Route::get('efitness/Administrativo/profile', 'ProfileController@index')->name('efitness.administrativo.profile');
Route::put('efitness/Administrativo/profile', 'ProfileController@update')->name('efitness.administrativo.profile.update');
Route::get('efitness/Administrativo/about', function () {
    return view('about');
})->name('about');
/*=========================Rotas Painel Recepção=======================================================================================================*/
Route::get('efitness/Recepcao/home-recepcao', 'HomeRecepcaoController@index')->name('home-recepcao');
Route::get('efitness/Recepcao/profile-recepcao', 'ProfileRecepcaoController@index')->name('profile-recepcao');
Route::put('efitness/Recepcao/profile-recepcao', 'ProfileRecepcaoController@update')->name('profile-recepcao.update');
/*=========================Rotas Painel Professor=======================================================================================================*/
Route::get('efitness/Professores/home-professor', 'HomeProfessorController@index')->name('home-professor');
Route::get('efitness/Professores/profile-professor', 'ProfileProfessorController@index')->name('profile-professor');
Route::put('efitness/Professores/profile-professor', 'ProfileProfessorController@update')->name('profile-professor.update');
/*=========================Rotas Painel Nutricionista=======================================================================================================*/
Route::get('efitness/Nutricionistas/home-nutricionista', 'HomeNutricionistaController@index')->name('home-nutricionista');
Route::get('efitness/Nutricionistas/profile-nutricionista', 'ProfileNutricionistaController@index')->name('profile-nutricionista');
Route::put('efitness/Nutricionistas/profile-nutricionista', 'ProfileNutricionistaController@update')->name('profile-nutricionista.update');
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
/*=========================Rotas Professores Avaliações Físicas=======================================================================================================*/
Route::get('efitness/Professores/avaliacoes/visualizar', 'efitness\Professores\Avaliacoes\ProfessorAvaliacoesAlunosController@index')->name('avaliacoes_professores_alunos');
/*=========================Rotas Professores Avaliações Medidas Físicas=======================================================================================================*/
Route::get('efitness/Professores/avaliacoes/alunos/novo/{id}', 'efitness\Professores\Avaliacoes\ProfessorAvaliacoesMedidasAlunosController@create')->name('avaliacoes_medidas_alunos.create');
Route::post('efitness/Professores/avaliacoes/alunos/novo/{id}', 'efitness\Professores\Avaliacoes\ProfessorAvaliacoesMedidasAlunosController@store')->name('avaliacoes_medidas_alunos.store');
Route::get('efitness/Professores/avaliacoes/alunos/visualizar', 'efitness\Professores\Avaliacoes\ProfessorAvaliacoesMedidasAlunosController@index')->name('avaliacoes_medidas_alunos');
Route::get('efitness/Professores/avaliacoes/alunos/editar/{id}', 'efitness\Professores\Avaliacoes\ProfessorAvaliacoesMedidasAlunosController@edit');
Route::post('efitness/Professores/avaliacoes/alunos/editar/{id}', 'efitness\Professores\Avaliacoes\ProfessorAvaliacoesMedidasAlunosController@update')->name('Alterar_avaliacao_medida_aluno');
Route::get('efitness/Professores/avaliacoes/alunos/excluir/{id}', 'efitness\Professores\Avaliacoes\ProfessorAvaliacoesMedidasAlunosController@delete');
Route::post('efitness/Professores/avaliacoes/alunos/excluir/{id}', 'efitness\Professores\Avaliacoes\ProfessorAvaliacoesMedidasAlunosController@destroy')->name('excluir__avaliacao_medida_aluno');
/*=========================Rotas Professores Treeinos Alunos=======================================================================================================*/
Route::get('efitness/Professores/treinos/alunos/novo/{id}', 'efitness\Professores\Treinos\ProfessorTreinosAlunosController@create')->name('treinos_alunos.create');
Route::post('efitness/Professores/treinos/alunos/novo/{id}', 'efitness\Professores\Treinos\ProfessorTreinosAlunosController@store')->name('treinos_alunos.store');
Route::get('efitness/Professores/treinos/alunos/visualizar', 'efitness\Professores\Treinos\ProfessorTreinosAlunosController@index')->name('treinos_alunos');
Route::get('efitness/Professores/treinos/alunos/editar/{id}', 'efitness\Professores\Treinos\ProfessorTreinosAlunosController@edit');
Route::post('efitness/Professores/treinos/alunos/editar/{id}', 'efitness\Professores\Treinos\ProfessorTreinosAlunosController@update')->name('Alterar_treino_aluno');
Route::get('efitness/Professores/treinos/alunos/excluir/{id}', 'efitness\Professores\Treinos\ProfessorTreinosAlunosController@delete');
Route::post('efitness/Professores/treinos/alunos/excluir/{id}', 'efitness\Professores\Treinos\ProfessorTreinosAlunosController@destroy')->name('excluir__treino_aluno');
/*=========================Rotas Administrativo Nutricionistas=======================================================================================================*/
Route::get('efitness/Administrativo/nutricionistas/novo', 'efitness\Administrativo\Nutricionistas\NutricionistasController@create')->name('nutricionistas.create');
Route::post('efitness/Administrativo/nutricionistas/novo', 'efitness\Administrativo\Nutricionistas\NutricionistasController@store')->name('nutricionistas.store');
Route::get('efitness/Administrativo/nutricionistas/visualizar', 'efitness\Administrativo\Nutricionistas\NutricionistasController@index')->name('nutricionistas');
Route::get('efitness/Administrativo/nutricionistas/editar/{id}', 'efitness\Administrativo\Nutricionistas\NutricionistasController@edit');
Route::post('efitness/Administrativo/nutricionistas/editar/{id}', 'efitness\Administrativo\Nutricionistas\NutricionistasController@update')->name('Alterar_nutricionista');
Route::get('efitness/Administrativo/nutricionistas/excluir/{id}', 'efitness\Administrativo\Nutricionistas\NutricionistasController@delete');
Route::post('efitness/Administrativo/nutricionistas/excluir/{id}', 'efitness\Administrativo\Nutricionistas\NutricionistasController@destroy')->name('excluir_nutricionista');
/*=========================Rotas Administrativo Recepção=======================================================================================================*/
Route::get('efitness/Administrativo/recepcao/novo', 'efitness\Administrativo\Recepcao\RecepcaoController@create')->name('recepcao.create');
Route::post('efitness/Administrativo/recepcao/novo', 'efitness\Administrativo\Recepcao\RecepcaoController@store')->name('recepcao.store');
Route::get('efitness/Administrativo/recepcao/visualizar', 'efitness\Administrativo\Recepcao\RecepcaoController@index')->name('recepcao');
Route::get('efitness/Administrativo/recepcao/editar/{id}', 'efitness\Administrativo\Recepcao\RecepcaoController@edit');
Route::post('efitness/Administrativo/recepcao/editar/{id}', 'efitness\Administrativo\Recepcao\RecepcaoController@update')->name('Alterar_recepcao');
Route::get('efitness/Administrativo/recepcao/excluir/{id}', 'efitness\Administrativo\Recepcao\RecepcaoController@delete');
Route::post('efitness/Administrativo/recepcao/excluir/{id}', 'efitness\Administrativo\Recepcao\RecepcaoController@destroy')->name('excluir_recepcao');
/*=========================Rotas Administrativo Alunos=======================================================================================================*/
Route::get('efitness/Administrativo/alunos/novo', 'efitness\Administrativo\Alunos\AlunosController@create')->name('alunos.create');
Route::post('efitness/Administrativo/alunos/novo', 'efitness\Administrativo\Alunos\AlunosController@store')->name('alunos.store');
Route::get('efitness/Administrativo/alunos/visualizar', 'efitness\Administrativo\Alunos\AlunosController@index')->name('alunos');
Route::get('efitness/Administrativo/alunos/editar/{id}', 'efitness\Administrativo\Alunos\AlunosController@edit');
Route::post('efitness/Administrativo/alunos/editar/{id}', 'efitness\Administrativo\Alunos\AlunosController@update')->name('Alterar_aluno');
Route::get('efitness/Administrativo/alunos/excluir/{id}', 'efitness\Administrativo\Alunos\AlunosController@delete');
Route::post('efitness/Administrativo/alunos/excluir/{id}', 'efitness\Administrativo\Alunos\AlunosController@destroy')->name('excluir_aluno');
/*=========================Rotas Recepcao Alunos=======================================================================================================*/
Route::get('efitness/Recepcao/alunos/novo', 'efitness\Recepcao\Alunos\RecepcaoAlunosController@create')->name('recepcao_alunos.create');
Route::post('efitness/Recepcao/alunos/novo', 'efitness\Recepcao\Alunos\RecepcaoAlunosController@store')->name('recepcao_alunos.store');
Route::get('efitness/Recepcao/alunos/visualizar', 'efitness\Recepcao\Alunos\RecepcaoAlunosController@index')->name('recepcao_alunos');
Route::get('efitness/Recepcao/alunos/editar/{id}', 'efitness\Recepcao\Alunos\RecepcaoAlunosController@edit');
Route::post('efitness/Recepcao/alunos/editar/{id}', 'efitness\Recepcao\Alunos\RecepcaoAlunosController@update')->name('Alterar_recepcao_aluno');
Route::get('efitness/Recepcao/alunos/excluir/{id}', 'efitness\Recepcao\Alunos\RecepcaoAlunosController@delete');
Route::post('efitness/Recepcao/alunos/excluir/{id}', 'efitness\Recepcao\Alunos\RecepcaoAlunosController@destroy')->name('excluir_recepcao_aluno');
/*=========================Rotas Recepcao Nutricionistas=======================================================================================================*/
Route::get('efitness/Recepcao/nutricionistas/novo', 'efitness\Recepcao\Nutricionistas\Cadastros\RecepcaoNutricionistasController@create')->name('recepcao_nutri.create');
Route::post('efitness/Recepcao/nutricionistas/novo', 'efitness\Recepcao\Nutricionistas\Cadastros\RecepcaoNutricionistasController@store')->name('recepcao_nutri.store');
Route::get('efitness/Recepcao/nutricionistas/visualizar', 'efitness\Recepcao\Nutricionistas\Cadastros\RecepcaoNutricionistasController@index')->name('recepcao_nutri');
Route::get('efitness/Recepcao/nutricionistas/editar/{id}', 'efitness\Recepcao\Nutricionistas\Cadastros\RecepcaoNutricionistasController@edit');
Route::post('efitness/Recepcao/nutricionistas/editar/{id}', 'efitness\Recepcao\Nutricionistas\Cadastros\RecepcaoNutricionistasController@update')->name('Alterar_nutri');
Route::get('efitness/Recepcao/nutricionistas/excluir/{id}', 'efitness\Recepcao\Nutricionistas\Cadastros\RecepcaoNutricionistasController@delete');
Route::post('efitness/Recepcao/nutricionistas/excluir/{id}', 'efitness\Recepcao\Nutricionistas\Cadastros\RecepcaoNutricionistasController@destroy')->name('excluir_nutri');
/*=========================Rotas Recepcao Professores=======================================================================================================*/
Route::get('efitness/Recepcao/professores/novo', 'efitness\Recepcao\Professores\RecepcaoProfessoresController@create')->name('recepcao_prof.create');
Route::post('efitness/Recepcao/professores/novo', 'efitness\Recepcao\Professores\RecepcaoProfessoresController@store')->name('recepcao_prof.store');
Route::get('efitness/Recepcao/professores/visualizar', 'efitness\Recepcao\Professores\RecepcaoProfessoresController@index')->name('recepcao_prof');
Route::get('efitness/Recepcao/professores/editar/{id}', 'efitness\Recepcao\Professores\RecepcaoProfessoresController@edit');
Route::post('efitness/Recepcao/professores/editar/{id}', 'efitness\Recepcao\Professores\RecepcaoProfessoresController@update')->name('Alterar_recepcao_prof');
Route::get('efitness/Recepcao/professores/excluir/{id}', 'efitness\Recepcao\Professores\RecepcaoProfessoresController@delete');
Route::post('efitness/Recepcao/professores/excluir/{id}', 'efitness\Recepcao\Professores\RecepcaoProfessoresController@destroy')->name('excluir_recepcao_prof');
/*=========================Rotas Recepcao Avaliação física=======================================================================================================*/
Route::get('efitness/Recepcao/avaliacoes/novo', 'efitness\Recepcao\Avaliacoes\RecepcaoAvaliacoesAlunosController@create')->name('avaliacoes_alunos.create');
Route::post('efitness/Recepcao/avaliacoes/novo', 'efitness\Recepcao\Avaliacoes\RecepcaoAvaliacoesAlunosController@store')->name('avaliacoes_alunos.store');
Route::get('efitness/Recepcao/avaliacoes/visualizar', 'efitness\Recepcao\Avaliacoes\RecepcaoAvaliacoesAlunosController@index')->name('avaliacoes_alunos');
Route::get('efitness/Recepcao/avaliacoes/editar/{id}', 'efitness\Recepcao\Avaliacoes\RecepcaoAvaliacoesAlunosController@edit');
Route::post('efitness/Recepcao/avaliacoes/editar/{id}', 'efitness\Recepcao\Avaliacoes\RecepcaoAvaliacoesAlunosController@update')->name('Alterar_avaliacao_aluno');
Route::get('efitness/Recepcao/avaliacoes/excluir/{id}', 'efitness\Recepcao\Avaliacoes\RecepcaoAvaliacoesAlunosController@delete');
Route::post('efitness/Recepcao/avaliacoes/excluir/{id}', 'efitness\Recepcao\Avaliacoes\RecepcaoAvaliacoesAlunosController@destroy')->name('excluir_avaliacao_aluno');
/*=========================Rotas Recepcao Consultas nutricionais=======================================================================================================*/
Route::get('efitness/Recepcao/nutricionistas/consultas/novo', 'efitness\Recepcao\Nutricionistas\Consultas\RecepcaoNutricionistasConsultasController@create')->name('consultas_alunos.create');
Route::post('efitness/Recepcao/nutricionistas/consultas/novo', 'efitness\Recepcao\Nutricionistas\Consultas\RecepcaoNutricionistasConsultasController@store')->name('consultas_alunos.store');
Route::get('efitness/Recepcao/nutricionistas/consultas/visualizar', 'efitness\Recepcao\Nutricionistas\Consultas\RecepcaoNutricionistasConsultasController@index')->name('consultas_alunos');
Route::get('efitness/Recepcao/nutricionistas/consultas/editar/{id}', 'efitness\Recepcao\Nutricionistas\Consultas\RecepcaoNutricionistasConsultasController@edit');
Route::post('efitness/Recepcao/nutricionistas/consultas/editar/{id}', 'efitness\Recepcao\Nutricionistas\Consultas\RecepcaoNutricionistasConsultasController@update')->name('Alterar_consulta_aluno');
Route::get('efitness/Recepcao/nutricionistas/consultas/excluir/{id}', 'efitness\Recepcao\Nutricionistas\Consultas\RecepcaoNutricionistasConsultasController@delete');
Route::post('efitness/Recepcao/nutricionistas/consultas/excluir/{id}', 'efitness\Recepcao\Nutricionistas\Consultas\RecepcaoNutricionistasConsultasController@destroy')->name('excluir_consulta_aluno');