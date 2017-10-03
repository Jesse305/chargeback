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
    return redirect()->route('sistemas');
});

Route::get('/menu', function () {
    return view('menu');
});

//rotas sistema
Route::get('sistemas', 'SistemaController@listar')->name('sistemas');
Route::post('sistema/inserir', 'SistemaController@inserir')->name('sistema.inserir');
Route::get('sistema/detalha/{id}', 'SistemaController@detalhar')->name('sistema.detalhar');
Route::get('sistema/altera/{id}', 'SistemaController@altera')->name('sistema.altera');
Route::post('sistema/atualizar/{id}', 'SistemaController@atualizar')->name('sistema.atualizar');
Route::get('sistema/apagar/{id}', 'SistemaController@apagar')->name('sistema.apagar');

//rotas orgaos
Route::get('orgaos', 'OrgaoController@listar')->name('orgaos');
Route::get('orgaos/json', 'OrgaoController@listarJson')->name('orgaos.json');
Route::post('orgao/inserir', 'OrgaoController@inserir')->name('orgao.inserir');
Route::get('orgao/detalha/{id}', 'OrgaoController@detalhar')->name('orgao.detalhar');
Route::get('orgao/altera/{id}', 'OrgaoController@altera')->name('orgao.altera');
route::post('orgao/atualizar/{id}', 'OrgaoController@atualizar')->name('orgao.atualizar');
Route::get('orgao/apagar/{id}', 'OrgaoController@apagar')->name('orgao.apagar');

//rotas unidades
Route::get('unidade/json/{id_orgao}', 'UnidadeController@unidadeByIdJson')->name('unidade.json');
Route::get('unidades', 'UnidadeController@listar')->name('unidades');
Route::get('unidade/detalha/{id}', 'UnidadeController@detalhar')->name('unidade.detalhar');
Route::post('unidade/inserir', 'UnidadeController@inserir')->name('unidade.inserir');
Route::get('unidade/altera/{id}', 'UnidadeController@altera')->name('unidade.altera');
Route::post('unidade/atualizar/{id}', 'UnidadeController@atualizar')->name('unidade.atualizar');
Route::get('unidade/apagar/{id}', 'UnidadeController@apagar')->name('unidade.apagar');

//rotas responsáveis
Route::get('responsaveis', 'ResponsavelController@listar')->name('responsaveis');
Route::post('responsavel/inserir', 'ResponsavelController@inserir')->name('responsavel.inserir');
Route::get('responsavel/detalha/{id}', 'ResponsavelController@detalha')->name('responsavel.detalha');
Route::get('responsavel/altera/{id}', 'ResponsavelController@altera')->name('responsavel.altera');
Route::post('responsavel/atualizar/{id}', 'ResponsavelController@atualizar')->name('responsavel.atualizar');
Route::get('responsavel/apagar/{id}', 'ResponsavelController@apagar')->name('responsavel.apagar');

//rotas banco
Route::get('bancos', 'BancoController@listar')->name('bancos');
Route::post('banco/inserir', 'BancoController@inserir')->name('banco.inserir');
Route::get('banco/detalha/{id}', 'BancoController@detalhar')->name('banco.detalhar');
Route::get('banco/altera/{id}', 'BancoController@altera')->name('banco.altera');
Route::post('banco/atualizar/{id}', 'BancoController@atualizar')->name('banco.atualizar');
Route::get('banco/apagar/{id}', 'BancoController@apagar')->name('banco.apagar');

//rotas desenvolvedor
Route::get('devs', 'DesenvolvedorController@listar')->name('desenvolvedores');
Route::post('dev/inserir', 'DesenvolvedorController@inserir')->name('desenvolvedor.inserir');
Route::get('dev/altera/{id}', 'DesenvolvedorController@altera')->name('desenvolvedor.altera');
Route::post('dev/atualizar/{id}', 'DesenvolvedorController@atualizar')->name('desenvolvedor.atualizar');
Route::get('dev/apagar/{id}', 'DesenvolvedorController@apagar')->name('desenvolvedor.apagar');

//rotas framework
Route::get('frameworks', 'FrameworkController@listar')->name('frameworks');
Route::post('framework/inserir', 'FrameworkController@inserir')->name('framework.inserir');
Route::get('framework/altera/{id}', 'FrameworkController@altera')->name('framework.altera');
Route::post('framework/atualizar/{id}', 'FrameworkController@atualizar')->name('framework.atualizar');
Route::get('framework/apagar/{id}', 'FrameworkController@apagar')->name('framework.apagar');

//rotas ambiente
Route::get('ambientes', 'AmbienteController@listar')->name('ambientes');
Route::post('ambiente/inserir', 'AmbienteController@inserir')->name('ambiente.inserir');
Route::get('ambiente/detalha/{id}', 'AmbienteController@detalhar')->name('ambiente.detalhar');
Route::get('ambiente/altera/{id}', 'AmbienteController@altera')->name('ambiente.altera');
Route::post('ambiente/atualizar/{id}', 'AmbienteController@atualizar')->name('ambiente.atualizar');
Route::get('ambiente/apagar/{id}', 'AmbienteController@apagar')->name('ambiente.apagar');

// rotas site
Route::get('sites', 'SiteController@listar')->name('sites');
Route::post('site/inserir', 'SiteController@inserir')->name('site.inserir');
Route::get('site/detalha/{id}', 'SiteController@detalhar')->name('site.detalhar');
Route::get('site/altera/{id}', 'SiteController@altera')->name('site.altera');
Route::post('site/atualizar/{id}', 'SiteController@atualizar')->name('site.atualizar');
Route::get('site/apagar/{id}', 'SiteController@apagar')->name('site.apagar');

//rotas p/ Item Configuração
Route::get('itens_config', 'ItemConfigController@listar')->name('itens_config');
Route::post('item_config/inserir', 'ItemConfigController@inserir')->name('item_config.inserir');
Route::get('item_config/detalha/{id}', 'ItemConfigController@detalhar')->name('item_config.detalhar');
Route::get('item_config/altera/{id}', 'ItemConfigController@altera')->name('item_config.altera');
Route::post('item_config/atualizar{id}', 'ItemConfigController@atualizar')->name('item_config.atualizar');
Route::get('item_config/apagar/{id}', 'ItemConfigController@apagar')->name('item_config.apagar');

//rotas Servidor VM
Route::get('servidores_vm', 'ServidorVmController@listar')->name('servidores_vm');
