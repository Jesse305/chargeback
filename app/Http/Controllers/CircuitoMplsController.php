<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CircuitoMpls;
use App\Orgao;
use App\ItemConfig;

class CircuitoMplsController extends Controller
{
    public function listar(){
    	$circuitos = CircuitoMpls::all();

    	return view('circuito_mpls/circuitos_mpls', compact("circuitos"));
    }

    public function detalhar($id){
    	$circuito = CircuitoMpls::findOrFail($id);

    	return view('circuito_mpls/circuito_mpls', compact('circuito'));

    }

    public function novo(){
    	$orgaos = Orgao::orderBy('no_orgao')->get(['id','no_orgao', 'no_sigla']);
    	$itensConfig = ItemConfig::where('categoriaitem_id', 4)
    	->where('no_item', 'LIKE', '%MPLS%')
    	->orderBy('id')->get(['id', 'no_item']); 

    	return view('circuito_mpls/novo_circuito_mpls', compact('orgaos', 'itensConfig'));
    }

    public function altera($id){
    	$circuito = CircuitoMpls::findOrFail($id);
    	$orgaos = Orgao::orderBy('no_orgao')->get(['id','no_orgao', 'no_sigla']); 
    	$itensConfig = ItemConfig::where('categoriaitem_id', 4)
    	->where('no_item', 'LIKE', '%MPLS%')
    	->orderBy('id')->get(['id', 'no_item']);  	

    	return view('circuito_mpls/alt_circuito_mpls', compact('circuito', 'orgaos', 'itensConfig'));
    }
}
