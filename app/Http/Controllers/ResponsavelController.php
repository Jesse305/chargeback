<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Responsavel;
use App\Orgao;
use App\Unidade;

class ResponsavelController extends Controller
{
    public function listar(){
    	$responsaveis = Responsavel::orderBy('no_responsavel')->get();
    	$orgaos = Orgao::orderBy('no_orgao')->get();
    	return view('responsavel/responsaveis', compact('responsaveis', 'orgaos'));
    }

    public function inserir(Request $request){
    	$dados = $request->except('_token');
      $count = Responsavel::where('no_responsavel', $request->no_responsavel)->
      where('orgao_id', $request->orgao_id)->where('unidade_id', $request->unidade_id)->count();
      if($count == 0){
        $insert = Responsavel::insert($dados);
        if($insert){
          \Session::flash('retorno', ['tipo'=>'success', 'msg'=>'Cadastro inserido com sucesso.']);
          return redirect()->back();
        }else{
          \Session::flash('retorno', ['tipo'=>'warning', 'msg'=>'Erro ao inserir cadastro.']);
          return redirect()->back();
        }
      }else{
        \Session::flash('retorno', ['tipo'=>'warning', 'msg'=>'Já existe um responsavel de mesmo nome na unidade selecionada.']);
        return redirect()->back();
      }
    }
    // fim inserir

    public function detalha($id){
      $responsavel = Responsavel::where('id', $id)->get();
      $orgao = Orgao::where('id', $responsavel[0]->orgao_id)->get();
      $unidade = Unidade::where('id', $responsavel[0]->unidade_id)->get();
      return view('responsavel/responsavel', compact('responsavel', 'orgao', 'unidade'));
    }
    // fim detalha

    public function altera($id){
      $responsavel = Responsavel::where('id', $id)->get();
      $orgao = Orgao::where('id', $responsavel[0]->orgao_id)->get();
      $unidade = Unidade::where('id', $responsavel[0]->unidade_id)->get();
      return view('responsavel/altera_responsavel', compact('responsavel', 'orgao', 'unidade'));
    }

    public function apagar($id){
      $delete = Responsavel::where('id', $id)->delete();
      if($delete){
        \Session::flash('retorno', ['tipo'=>'success', 'msg'=>'Cadastro apagado com sucesso!']);
        return redirect()->back();
      }
      else{
        \Session::flash('retorno', ['tipo'=>'warning', 'msg'=>'Não foi possível apagar o registro.']);
        return redirect()->back();
      }
    }
}
