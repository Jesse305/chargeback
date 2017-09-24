<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orgao;

class OrgaoController extends Controller
{
    public function listar(){

    	$orgaos = Orgao::orderBy('no_orgao')->get();
    	return view('orgao/orgaos', compact('orgaos'));

    }

    public function inserir(Request $request){
    	$dados = $request->except('_token');

        $count = Orgao::where('no_orgao', $request->no_orgao)->count();

        if($count == 0){
            $insere = Orgao::insert($dados);
            if($insere){
                \Session::flash('retorno',['tipo'=>'success', 'msg'=>'Registro inserido com sucesso!']);
                return redirect()->back();
            }else{
                \Session::flash('retorno',['tipo'=>'warning', 'msg'=>'Não foi possível inserir registro!']);
                return redirect()->back();
            }
        }else{
            \Session::flash('retorno',['tipo'=>'warning', 'msg'=>'Já existe órgão de mesmo nome!']);
            return redirect()->back();
        }

    }
    //fim insere

    public function detalhar($id){
        $orgao = Orgao::where('id', $id)->get();
        return view('orgao/orgao', compact('orgao'));
    }

    public function listarJson(){

    	$orgaosJson = Orgao::orderBy('no_orgao')->get();
    	echo json_encode($orgaosJson, JSON_UNESCAPED_UNICODE);

    }

    public function altera($id){
        $orgao = Orgao::where('id', $id)->get();
        return view('orgao/altera_orgao', compact('orgao'));
    }

    public function atualizar(Request $request, $id){
        $dados = $request->except('_token');
        $atualizar = Orgao::where('id', $id)->update($dados);

        if($atualizar){
            \Session::flash('retorno',['tipo'=>'success', 'msg'=>'Cadastro atualizado com sucesso!']);
            return redirect()->route('orgaos');
        }else{
            \Session::flash('retorno',['tipo'=>'warning', 'msg'=>'Cadastro não alterado!']);
            return redirect()->route('orgaos');
        }
    }

    public function apagar($id){
        $delete = Orgao::find($id)->delete();

        if($delete){
           \Session::flash('retorno',['tipo'=>'success', 'msg'=>'Registro apagado com sucesso.']);
            return redirect()->back(); 
        }
        else{
            \Session::flash('retorno',['tipo'=>'warning', 'msg'=>'Registro não apagado.']);
            return redirect()->back();
        }
    }
}
