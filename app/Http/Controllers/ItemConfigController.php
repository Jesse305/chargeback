<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ItemConfig;

class ItemConfigController extends Controller
{
    public function listar(){
    	$listaItens = ItemConfig::orderBy('no_item')->get();
    	$categoriasItens = DB::table('categoriaitem')->get();
    	return view('item_config/itens_config', compact('listaItens', 'categoriasItens'));
    }

    public function inserir(Request $req){
    	$dados = $req->except('_token');
    	$count = ItemConfig::where('no_item', $req->no_item)->count();

    	if($count == 0){
    		ItemConfig::insert($dados);
    		\Session::flash('retorno', ['tipo'=>'success', 'msg'=>'Cadastro efetuado com sucesso.']);
    		return redirect()->back();

    	}
    	else{
    		\Session::flash('retorno', ['tipo'=>'warning', 'msg'=>'Já existe um Item de configuração de mesmo nome.']);
    		return redirect()->back();
    	}
    }
    // fim inserir

    public function detalhar($id){
    	$item = ItemConfig::where('id', $id)->first();
    	$categoria = DB::table('categoriaitem')->where('id', $item->categoriaitem_id)->first();
    	return view('item_config/item_config', compact('item', 'categoria'));
    }

    public function altera($id){
    	$item = ItemConfig::where('id', $id)->first();
    	$categoriasItens = DB::table('categoriaitem')->get();
    	return view('item_config/altera_item_config', compact('item', 'categoriasItens'));
    }
}
