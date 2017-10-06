<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\ServidorVm;
use App\Orgao;
use App\Unidade;
use App\Responsavel;
use App\ItemConfig;

class ServidorVmController extends Controller
{
    public function listar()
    {
    	$servs_vm = ServidorVm::all();

    	return view('serv_vm/servidores_vm', compact('servs_vm'));
    }

    public function detalhar($id)
    {
    	$serv_vm = ServidorVm::findOrfail($id);
    	$orgao = Orgao::findOrfail($serv_vm->orgao_id);
    	$unidade = Unidade::find($serv_vm->unidade_id);
    	$resp = Responsavel::find($serv_vm->responsavel_id);

    	return view('serv_vm/servidor_vm', compact('serv_vm', 'orgao', 'unidade', 'resp'));
    }

    public function viewInsere(){
        $orgaos = Orgao::orderBy('no_orgao')->get();
        $clouds = ItemConfig::where('categoriaitem_id', 1)->orderBy('no_item')->get();
        $sis_ops = ItemConfig::where('categoriaitem_id', 2)->orderBy('no_item')->get();
        return view('serv_vm/novo_serv_vm', compact('orgaos', 'clouds', 'sis_ops'));
    }

    public function inserir(Request $request){
        $dados = $request->except('_token');

        $rules = [
            'orgao_id' => 'required',
            'unidade_id' => 'required',
            'responsavel_id' => 'required',
            'no_servidor' => 'required|unique:servidorvm',
            'ip_endereco' => 'required',
            'no_dns' => 'required'
        ];

        $messages = [
            'orgao_id.required' => 'Selecione o Órgão solicitante.',
            'unidade_id.required' => 'Selecione a Unidade solicitante.',
            'responsavel_id.required' => 'Selecione o Responsavel.',
            'no_servidor.required' => 'Informe um nome para o Servidor VM.',
            'no_servidor.unique' => 'Já existe Servidor VM de mesmo nome.',
            'ip_endereco.required' => 'Informe IP do Servidor VM.',
            'no_dns.required' => 'Informe o DNS do Servidor VM.'
        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        $serv_vm = new ServidorVm();
        $serv_vm->fill($dados)->save();

        return redirect()
        ->back()
        ->with('retorno', ['tipo'=>'success', 'msg'=>'Cadastro efetuado com sucesso.']);   

    }
    // fim inserir

    public function altera($id){
        $serv_vm = ServidorVm::findOrfail($id);
        $orgaos = Orgao::orderBy('no_orgao')->get();
        $unidade = Unidade::find($serv_vm->unidade_id);
        $responsavel = Responsavel::find($serv_vm->responsavel_id);
        $clouds = ItemConfig::where('categoriaitem_id', 1)->orderBy('no_item')->get();
        $sis_ops = ItemConfig::where('categoriaitem_id', 2)->orderBy('no_item')->get();

        return view('serv_vm/alt_serv_vm', compact('serv_vm', 'unidade', 'responsavel', 'orgaos', 'clouds', 'sis_ops'));
    }


}
