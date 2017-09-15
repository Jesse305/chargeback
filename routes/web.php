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
Route::get('/sistemas',['as'=>'sistemas', 'uses'=>'SistemaController@listar']);

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

