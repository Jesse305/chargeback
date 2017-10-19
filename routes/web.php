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
Route::get('sistema/detalha/{sistema}', 'SistemaController@detalhar')->name('sistema.detalhar');
Route::get('sistema/altera/{sistema}', 'SistemaController@altera')->name('sistema.altera');
Route::post('sistema/atualizar/{sistema}', 'SistemaController@atualizar')->name('sistema.atualizar');
Route::get('sistema/apagar/{sistema}', 'SistemaController@apagar')->name('sistema.apagar');

//rotas orgaos
Route::get('orgaos', 'OrgaoController@listar')->name('orgaos');
Route::get('orgaos/json', 'OrgaoController@listarJson')->name('orgaos.json');
Route::post('orgao/inserir', 'OrgaoController@inserir')->name('orgao.inserir');
Route::get('orgao/detalha/{orgao}', 'OrgaoController@detalhar')->name('orgao.detalhar');
Route::get('orgao/altera/{orgao}', 'OrgaoController@altera')->name('orgao.altera');
route::post('orgao/atualizar/{orgao}', 'OrgaoController@atualizar')->name('orgao.atualizar');
Route::get('orgao/apagar/{orgao}', 'OrgaoController@apagar')->name('orgao.apagar');

//rotas unidades
Route::get('unidade/json/{id_orgao}', 'UnidadeController@unidadeByIdJson')->name('unidade.json');
Route::get('unidades', 'UnidadeController@listar')->name('unidades');
Route::get('unidade/detalha/{unidade}', 'UnidadeController@detalhar')->name('unidade.detalhar');
Route::post('unidade/inserir', 'UnidadeController@inserir')->name('unidade.inserir');
Route::get('unidade/altera/{unidade}', 'UnidadeController@altera')->name('unidade.altera');
Route::post('unidade/atualizar/{unidade}', 'UnidadeController@atualizar')->name('unidade.atualizar');
Route::get('unidade/apagar/{unidade}', 'UnidadeController@apagar')->name('unidade.apagar');

//rotas responsáveis
Route::get('responsaveis', 'ResponsavelController@listar')->name('responsaveis');
Route::post('responsavel/inserir', 'ResponsavelController@inserir')->name('responsavel.inserir');
Route::get('responsavel/detalha/{responsavel}', 'ResponsavelController@detalha')->name('responsavel.detalha');
Route::get('responsavel/altera/{responsavel}', 'ResponsavelController@altera')->name('responsavel.altera');
Route::post('responsavel/atualizar/{responsavel}', 'ResponsavelController@atualizar')->name('responsavel.atualizar');
Route::get('responsavel/apagar/{responsavel}', 'ResponsavelController@apagar')->name('responsavel.apagar');
//pelo id da unidade
Route::get('responsaveis/json/{id}', 'ResponsavelController@respsByIdJson')->name('resps.json');

//rotas banco
Route::get('bancos', 'BancoController@listar')->name('bancos');
Route::post('banco/inserir', 'BancoController@inserir')->name('banco.inserir');
Route::get('banco/detalha/{banco}', 'BancoController@detalhar')->name('banco.detalhar');
Route::get('banco/altera/{banco}', 'BancoController@altera')->name('banco.altera');
Route::post('banco/atualizar/{banco}', 'BancoController@atualizar')->name('banco.atualizar');
Route::get('banco/apagar/{banco}', 'BancoController@apagar')->name('banco.apagar');

//rotas desenvolvedor
Route::get('devs', 'DesenvolvedorController@listar')->name('desenvolvedores');
Route::post('dev/inserir', 'DesenvolvedorController@inserir')->name('desenvolvedor.inserir');
Route::get('dev/altera/{dev}', 'DesenvolvedorController@altera')->name('desenvolvedor.altera');
Route::post('dev/atualizar/{dev}', 'DesenvolvedorController@atualizar')->name('desenvolvedor.atualizar');
Route::get('dev/apagar/{dev}', 'DesenvolvedorController@apagar')->name('desenvolvedor.apagar');

//rotas framework
Route::get('frameworks', 'FrameworkController@listar')->name('frameworks');
Route::post('framework/inserir', 'FrameworkController@inserir')->name('framework.inserir');
Route::get('framework/altera/{framework}', 'FrameworkController@altera')->name('framework.altera');
Route::post('framework/atualizar/{framework}', 'FrameworkController@atualizar')->name('framework.atualizar');
Route::get('framework/apagar/{framework}', 'FrameworkController@apagar')->name('framework.apagar');

//rotas ambiente
Route::get('ambientes', 'AmbienteController@listar')->name('ambientes');
Route::post('ambiente/inserir', 'AmbienteController@inserir')->name('ambiente.inserir');
Route::get('ambiente/detalha/{ambiente}', 'AmbienteController@detalhar')->name('ambiente.detalhar');
Route::get('ambiente/altera/{ambiente}', 'AmbienteController@altera')->name('ambiente.altera');
Route::post('ambiente/atualizar/{ambiente}', 'AmbienteController@atualizar')->name('ambiente.atualizar');
Route::get('ambiente/apagar/{ambiente}', 'AmbienteController@apagar')->name('ambiente.apagar');

// rotas site
Route::get('sites', 'SiteController@listar')->name('sites');
Route::post('site/inserir', 'SiteController@inserir')->name('site.inserir');
Route::get('site/detalha/{site}', 'SiteController@detalhar')->name('site.detalhar');
Route::get('site/altera/{site}', 'SiteController@altera')->name('site.altera');
Route::post('site/atualizar/{site}', 'SiteController@atualizar')->name('site.atualizar');
Route::get('site/apagar/{site}', 'SiteController@apagar')->name('site.apagar');

//rotas p/ Item Configuração
Route::get('itens_config', 'ItemConfigController@listar')->name('itens_config');
Route::post('item_config/inserir', 'ItemConfigController@inserir')->name('item_config.inserir');
Route::get('item_config/detalha/{item}', 'ItemConfigController@detalhar')->name('item_config.detalhar');
Route::get('item_config/altera/{item}', 'ItemConfigController@altera')->name('item_config.altera');
Route::post('item_config/atualizar{item}', 'ItemConfigController@atualizar')->name('item_config.atualizar');
Route::get('item_config/apagar/{item}', 'ItemConfigController@apagar')->name('item_config.apagar');

//rotas Servidor VM
Route::get('servidores_vm', 'ServidorVmController@listar')->name('servidores_vm');
Route::get('servidor_vm/detalha/{servVm}', 'ServidorVmController@detalhar')->name('servidor_vm.detalhar');
Route::get('servidor_vm/form/insere', 'ServidorVmController@viewInsere')->name('servidor_vm.form.insere');
Route::post('servidor_vm/inserir', 'ServidorVmController@inserir')->name('servidor_vm.inserir');
Route::get('servidor_vm/altera/{servVm}', 'ServidorVmController@altera')->name('servidor_vm.altera');
Route::post('servidor_vm/atualizar/{servVm}', 'ServidorVmController@atualizar')->name('servidor_vm.atualizar');
Route::get('servidor_vm/apagar/{servVm}', 'ServidorVmController@apagar')->name('servidor_vm.apagar');

//rotas circuitos MPLS
Route::get('circuitos_mpls', 'CircuitoMplsController@listar')->name('circuitos_mpls');
Route::get('circuito_mpls/detalha/{circuito}', 'CircuitoMplsController@detalhar')->name('circuito_mpls.detalhar');
Route::get('circuito_mpls/view_novo', 'CircuitoMplsController@novo')->name('circuito_mpls.novo');
Route::post('circuito_mpls/inserir', 'CircuitoMplsController@inserir')->name('circuito_mpls.inserir');
Route::get('circuito_mpls_altera/{circuito}', 'CircuitoMplsController@altera')->name('circuito_mpls.altera');
Route::post('circuito_mpls/atualizar/{circuito}', 'CircuitoMplsController@atualizar')->name('circuito_mpls.atualizar');
Route::get('circuito_mpls/apagar/{circuito}', 'CircuitoMplsController@apagar')->name('circuito_mpls.apagar');

//rotas movimentação circuito por id circuito
Route::get('movimentacoes_circ/{id}', 'MovCircuitoController@listar')->name('movimentacoes_circ');
Route::get('movimentacao_circ/detalha/{mc}', 'MovCircuitoController@detalhar')->name('movimentacao_circ.detalhar');
Route::get('movimentacao_circ_novo/{circuito}', 'MovCircuitoController@novo')->name('movimentacao_circ.novo');
Route::post('movimentacao_circ/inserir', 'MovCircuitoController@inserir')->name('movimentacao_circ.inserir');
