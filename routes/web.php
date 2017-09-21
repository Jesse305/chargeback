<?php

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

Route::get('/menu', function () {
    return view('menu');
});

//rotas sistema
Route::get('/sistema/sistemas',['as'=>'sistemas', 'uses'=>'SistemaController@listar']);
Route::post('/sistema/inserir',['as'=>'sistema.inserir', 'uses'=>'SistemaController@inserir']);
Route::get('/sistema/detalha/{id}', ['as'=>'sistema.detalhar', 'uses'=>'SistemaController@detalhar']);
Route::get('/sistema/altera/{id}', ['as'=>'sistema.altera', 'uses'=>'SistemaController@altera']);
Route::get('/sistema/apagar/{id}', ['as'=>'sistema.apagar', 'uses'=>'SistemaController@apagar']);

//rotas orgaos
Route::get('/orgaos', ['as'=>'orgaos', 'uses'=>'OrgaoController@listar']);
Route::get('/orgaos/json', ['as'=>'orgaos.json', 'uses'=>'OrgaoController@listarJson']);

//rotas unidades
Route::get('/unidade/json/{id_orgao}', ['as'=>'unidade.json', 'uses'=>'UnidadeController@unidadeByIdJson']);

//rotas banco
Route::get('/banco/bancos', ['as'=>'bancos', 'uses'=>'BancoController@listar']);
Route::post('/banco/inserir', ['as'=>'banco.inserir', 'uses'=>'BancoController@inserir']);
Route::get('/banco/detalha/{id}', ['as'=>'banco.detalhar', 'uses'=>'BancoController@detalhar']);
Route::get('/banco/altera/{id}', ['as'=>'banco.altera', 'uses'=>'BancoController@altera']);
Route::post('/banco/atualizar/{id}', ['as'=>'banco.atualizar', 'uses'=>'BancoController@atualizar']);
Route::get('/banco/apagar/{id}', ['as'=>'banco.apagar', 'uses'=>'BancoController@apagar']);

//rotas desenvolvedor
Route::get('/dev/desenvolvedores', ['as'=>'desenvolvedores', 'uses'=>'DesenvolvedorController@listar']);
Route::post('/dev/inserir', ['as'=>'desenvolvedor.inserir', 'uses'=>'DesenvolvedorController@inserir']);
Route::get('/dev/altera/{id}', ['as'=>'desenvolvedor.altera', 'uses'=>'DesenvolvedorController@altera']);
Route::post('/dev/atualizar/{id}', ['as'=>'desenvolvedor.atualizar', 'uses'=>'DesenvolvedorController@atualizar']);
Route::get('/dev/apagar/{id}', ['as'=>'desenvolvedor.apagar', 'uses'=>'DesenvolvedorController@apagar']);


//rotas framework
Route::get('/framework/frameworks', ['as'=>'frameworks', 'uses'=>'FrameworkController@listar']);
Route::post('/framework/inserir', ['as'=>'framework.inserir', 'uses'=>'FrameworkController@inserir']);
Route::get('/framework/altera/{id}', ['as'=>'framework.altera', 'uses'=>'FrameworkController@altera']);
Route::post('/framework/atualizar/{id}', ['as'=>'framework.atualizar', 'uses'=>'FrameworkController@atualizar']);
Route::get('/framework/apagar/{id}', ['as'=>'framework.apagar', 'uses'=>'FrameworkController@apagar']);

//rotas ambiente
Route::get('/ambiente/ambientes', ['as'=>'ambientes', 'uses'=>'AmbienteController@listar']);
Route::post('/ambiente/inserir', ['as'=>'ambiente.inserir', 'uses'=>'AmbienteController@inserir']);
Route::get('/ambiente/detalha/{id}', ['as'=>'ambiente.detalhar', 'uses'=>'AmbienteController@detalhar']);
Route::get('/ambiente/altera/{id}', ['as'=>'ambiente.altera', 'uses'=>'AmbienteController@altera']);
Route::post('/ambiente/atualizar/{id}', ['as'=>'ambiente.atualizar', 'uses'=>'AmbienteController@atualizar']);
Route::get('/ambiente/apagar/{id}', ['as'=>'ambiente.apagar', 'uses'=>'AmbienteController@apagar']);
