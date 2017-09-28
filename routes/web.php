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
Route::get('/sistema/sistemas',['as'=>'sistemas', 'uses'=>'SistemaController@listar']);
Route::post('/sistema/inserir',['as'=>'sistema.inserir', 'uses'=>'SistemaController@inserir']);
Route::get('/sistema/detalha/{id}', ['as'=>'sistema.detalhar', 'uses'=>'SistemaController@detalhar']);
Route::get('/sistema/altera/{id}', ['as'=>'sistema.altera', 'uses'=>'SistemaController@altera']);
Route::post('/sistema/atualizar/{id}', ['as'=>'sistema.atualizar', 'uses'=>'SistemaController@atualizar']);
Route::get('/sistema/apagar/{id}', ['as'=>'sistema.apagar', 'uses'=>'SistemaController@apagar']);

//rotas orgaos
Route::get('/orgao/orgaos', ['as'=>'orgaos', 'uses'=>'OrgaoController@listar']);
Route::get('/orgaos/json', ['as'=>'orgaos.json', 'uses'=>'OrgaoController@listarJson']);
Route::post('/orgao/inserir', ['as' => 'orgao.inserir', 'uses' => 'OrgaoController@inserir']);
Route::get('/orgao/detalha/{id}', ['as' => 'orgao.detalhar', 'uses' => 'OrgaoController@detalhar']);
Route::get('/orgao/altera/{id}', ['as' => 'orgao.altera', 'uses' => 'OrgaoController@altera']);
route::post('/orgao/atualizar/{id}', ['as' => 'orgao.atualizar', 'uses' => 'OrgaoController@atualizar']);
Route::get('/orgao/apagar/{id}', ['as' => 'orgao.apagar', 'uses' => 'OrgaoController@apagar']);

//rotas unidades
Route::get('/unidade/json/{id_orgao}', ['as'=>'unidade.json', 'uses'=>'UnidadeController@unidadeByIdJson']);
Route::get('/unidade/unidades', ['as' => 'unidades', 'uses' => 'UnidadeController@listar']);
Route::get('/unidade/detalha/{id}', ['as' => 'unidade.detalhar', 'uses' => 'UnidadeController@detalhar']);
Route::post('/unidade/inserir', ['as' => 'unidade.inserir', 'uses' => 'UnidadeController@inserir']);
Route::get('/unidade/altera/{id}', ['as'=>'unidade.altera', 'uses'=>'UnidadeController@altera']);
Route::post('/unidade/atualizar/{id}', ['as'=>'unidade.atualizar', 'uses'=>'UnidadeController@atualizar']);
Route::get('/unidade/apagar/{id}', ['as'=>'unidade.apagar', 'uses'=>'UnidadeController@apagar']);

//rotas responsáveis
Route::get('/responsavel/responsaveis', ['as'=>'responsaveis', 'uses'=>'ResponsavelController@listar']);
Route::post('/responsavel/inserir', ['as'=>'responsavel.inserir', 'uses'=>'ResponsavelController@inserir']);
Route::get('/responsavel/detalha/{id}', ['as'=>'responsavel.detalha', 'uses'=>'ResponsavelController@detalha']);
Route::get('/responsavel/altera/{id}', ['as'=>'responsavel.altera', 'uses'=>'ResponsavelController@altera']);
Route::post('/responsavel/atualizar/{id}', ['as'=>'responsavel.atualizar', 'uses'=>'ResponsavelController@atualizar']);
Route::get('/responsavel/apagar/{id}', ['as'=>'responsavel.apagar', 'uses'=>'ResponsavelController@apagar']);

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

// rotas site
Route::get('site/sites', ['as' => 'sites', 'uses' => 'SiteController@listar']);
Route::post('/site/inserir', ['as'=>'site.inserir', 'uses'=>'SiteController@inserir']);
Route::get('/site/detalha/{id}', ['as'=>'site.detalhar', 'uses'=>'SiteController@detalhar']);
Route::get('/site/altera/{id}', ['as'=>'site.altera', 'uses'=>'SiteController@altera']);
Route::post('/site/atualizar/{id}', ['as'=>'site.atualizar', 'uses'=>'SiteController@atualizar']);
Route::get('/site/apagar/{id}', ['as'=>'site.apagar', 'uses'=>'SiteController@apagar']);

//rotas p/ Item Configuração
Route::get('/item_config/itens_config', ['as'=>'itens_config', 'uses'=>'ItemConfigController@listar']);
Route::post('/item_config/inserir', ['as'=>'item_config.inserir', 'uses'=>'ItemConfigController@inserir']);
Route::get('/item_config/detalha/{id}', ['as'=>'item_config.detalhar', 'uses'=>'ItemConfigController@detalhar']);
Route::get('/item_config/altera/{id}', ['as'=>'item_config.altera', 'uses'=>'ItemConfigController@altera']);
