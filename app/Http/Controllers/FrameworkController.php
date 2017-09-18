<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Framework;

class FrameworkController extends Controller
{
    public function listar(){
    	$listaFrameworks = Framework::all();
    	return view('framework/frameworks', compact('listaFrameworks'));
    }

    public function inserir(Request $request){
      $dados = $request->except(['_token']);
      $count = Framework::where('no_framework', '=', $request->no_framework)->count();

      if($count == 0){
        Framework::insert($dados);
        \Session::flash('retorno',['tipo'=>'success', 'msg'=>'Registro inserido com sucesso!']);
        return redirect()->back();
    	}else{
        \Session::flash('retorno',['tipo'=>'warning', 'msg'=>'Framework já possui registro!']);
    		return redirect()->back();        
    	}
    }

    public function altera($id){
      $framework = Framework::find($id);
      return view('/framework/altera_framework', compact('framework'));
    }

    public function atualizar(Request $request, $id){
      $dados = $request->except(['_token', '_update']);
      Framework::where('id', $id)->update($dados);
      \Session::flash('retorno',['tipo'=>'success', 'msg'=>'Registro alterado com sucesso!']);
      return redirect()->route('frameworks');
    }

    public function apagar($id){
      Framework::find($id)->delete();
      \Session::flash('retorno',['tipo'=>'success', 'msg'=>'Registro apagado com sucesso!']);
      return redirect()->back()->with('delete', ['deletado']);
    }
}
