<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Desenvolvedor;

class DesenvolvedorController extends Controller
{
    public function listar(){
    	$listaDevs = Desenvolvedor::all();
    	return view('dev/desenvolvedores', compact('listaDevs'));
    }

    public function inserir(Request $request){

    	$dados = $request->except(['_token', '_insert']);
    	$count = Desenvolvedor::where('no_dev','=', $request->no_dev)->count();
    	if($count == 0){
    		Desenvolvedor::insert($dados);
    		return redirect()->back()->with('inserido', ['inserido']);
    	}else{
    		return redirect()->back()->with('duplicado', ['duplicado']);
    	}
    	
    }

    public function apagar($id){
    	Desenvolvedor::find($id)->delete();
    	return redirect()->back()->with('delete', ['deletado']);
    }


}
