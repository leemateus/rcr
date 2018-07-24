<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('auth/login','ApiAuthController@login');
//
// Route::group(['middleware'=>'jwt.auth','namespace'=>'Api\\'],function(){
//   Route::get('auth/me','AuthController@me');
//   Route::post('auth/refresh','AuthController@refresh');
// });

//inserir um profissional
Route::post('profissional','ProfissionalController@store');
//seleciona paciente para referencia por numero do sus com o like
Route::get('pacientes/{numSus}','PacienteController@shows');
//seleciona todos os pacientes
Route::get('paciente','PacienteController@index');
//seleciona um paciente específico
Route::get('paciente/{numSus}','PacienteController@show');
//inserir paciente
Route::post('paciente','PacienteController@store');
//inserir referencia do paciente ja selecionado, instituicao e especialidade
Route::post('referencia','ReferenciaController@store');
//inserir contrarreferenica com o codigo da referencia ja selecionado
Route::post('contrarreferencia','ContraRreferenciaController@store');
//seleciona referencias com contrarreferencia disponível para um profissional
Route::get('referencia/comcontrarreferencia/{numConselho_id}','ReferenciaController@showC');
//seleciona todas as instituiçoes
Route::get('instituicao','InstituicaoController@index');
//seleciona todas as especialidades
Route::get('especialidade','EspecialidadeController@index');
//seleciona referencias sem contrarreferencia para uma determinada especialidade e instituicao
Route::get('referencia/semcontrarreferencia/{numConselho_id}','ReferenciaController@showS');
//seleciona uma contrarreferencia de uma determinada referencia
Route::get('contrarreferencia/{referencia_id}','ContraRreferenciaController@show');
