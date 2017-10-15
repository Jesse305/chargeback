<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MovCircuito;
use App\CircuitoMpls;
use App\Orgao;
use App\Unidade;
use App\Responsavel;
use App\ItemConfig;
use Validator;

class MovCircuitoController extends Controller
{
	public function listar($id){
		$movs_circuito = MovCircuito::where('circuitompls_id', $id)->get();

		return view('mov_circuito/movimentacoes_circ', compact('movs_circuito', 'id'));
	}

	public function detalhar($id){
		$mc = MovCircuito::findOrFail($id);

		return view('mov_circuito/movimentacao_circ', compact('mc'));
	}  

	public function novo($id){
		$circuito = CircuitoMpls::findOrFail($id);
		$orgaos = Orgao::orderBy('no_orgao')->get(['no_orgao', 'id']);
		$itens = ItemConfig::where('categoriaitem_id', 4)
		->where('no_item', 'LIKE', '%MPLS%')
		->get(['id', 'no_item']);

		return view('mov_circuito/novo_movimentacao_circ', compact('circuito', 'orgaos', 'itens'));
	}

	public function valida($dados){
		$rules = [
			'orgao_id' => 'required',
			'unidade_id' => 'required',
			'responsavel_id' => 'required',
			'no_designacao' => 'required'
		];
		$messages = [
			'orgao_id.required' => 'Selecione o Órgão',
			'unidade_id.required' => 'Selecione a Unidade',
			'responsavel_id.required' => 'Selecione a Unidade',
			'no_designacao.required' => 'Informe a Designação'
		];

		return Validator::make($dados, $rules, $messages)->validate();
	}

	public function inserir(Request $request){
		$this->valida($request->all());

		$insert = [
			'circuitompls_id' => $request->circuitompls_id,
			'orgao_id' => $request->old_orgao_id,
			'unidade_id' => $request->old_unidade_id,
			'responsavel_id' => $request->old_responsavel_id,
			'itemdeconfiguracao_id' => $request->old_itemdeconfiguracao_id,
			'no_designacao' => $request->old_no_designacao,
			'ip_lan' => $request->old_ip_lan,
			'ip_mascara' => $request->old_ip_mascara,
			'wan_cliente' => $request->old_wan_cliente,
			'wan_operadora' => $request->old_wan_operadora,
			'dt_instalacao' => $request->old_dt_instalacao,
			'dt_homologacao' => $request->old_dt_homologacao,
			'ds_observacao' => $request->old_ds_observacao
		];

		$update = [
			'orgao_id' => $request->orgao_id,
			'unidade_id' => $request->unidade_id,
			'responsavel_id' => $request->responsavel_id,
			'itemdeconfiguracao_id' => $request->itemdeconfiguracao_id,
			'no_designacao' => $request->no_designacao,
			'ip_lan' => $request->ip_lan,
			'ip_mascara' => $request->ip_mascara,
			'wan_cliente' => $request->wan_cliente,
			'wan_operadora' => $request->wan_operadora,
			'dt_instalacao' => $request->dt_instalacao,
			'dt_homologacao' => $request->dt_homologacao,
			'ds_observacao' => $request->ds_observacao
		];

		$circuito_mpls = new CircuitoMpls();
		$circuito_mpls->findOrFail($request->circuitompls_id)->update($update);

		$mov_circ = new MovCircuito();
		$mov_circ->fill($insert)->save();

		return redirect()
		->route('movimentacoes_circ', $request->circuitompls_id)
		->with('retorno',['tipo'=>'success', 'msg'=>'Movimentação salva com sucesso.']);
	}
}
