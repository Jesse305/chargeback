<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MovCircuito;

class MovCircuitoController extends Controller
{
	public function listar($id){
		$movs_circuito = MovCircuito::where('circuitompls_id', $id)->get();

		return view('mov_circuito/movimentacoes_circ', compact('movs_circuito'));
	}

	public function detalhar($id){
		$mc = MovCircuito::findOrFail($id);

		return view('mov_circuito/movimentacao_circ', compact('mc'));
	}  

	public function novo($id){

		return view('mov_circuito/novo_movimentacao_circ');
	}
}
