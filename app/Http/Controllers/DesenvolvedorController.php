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
        \Session::flash('retorno',['tipo'=>'success', 'msg'=>'Registro inserido com sucesso!']);
    		return redirect()->back();
    	}else{
        \Session::flash('retorno',['tipo'=>'warning', 'msg'=>'Desenvolvedor já possui cadastro!']);
    		return redirect()->back();
    	}

    }

    public function altera($id){
        $dev = Desenvolvedor::where('id', $id)->get();
        return view('dev/altera_desenvolvedor', compact('dev'));
    }

    public function atualizar(Request $request, $id){

        $dados = $request->except(['_token', '_update']);
        Desenvolvedor::where('id', '=', $id)->update($dados);
        \Session::flash('retorno',['tipo'=>'success', 'msg'=>'Registro alterado com sucesso!']);
        return redirect()->route('desenvolvedores')->withInput();
    }

    public function apagar($id){
    	Desenvolvedor::find($id)->delete();
      \Session::flash('retorno',['tipo'=>'success', 'msg'=>'Registro apagado com sucesso!']);
    	return redirect()->back()->with('delete', ['deletado']);
    }


}
