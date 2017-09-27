<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orgao;
use App\Unidade;
use App\Responsavel;
use App\Site;

class SiteController extends Controller
{
    public function listar(){
    	$listaOrgaos = Orgao::orderBy('no_orgao')->get();
      $listaSites = Site::orderBy('no_site')->get();
    	return view('site/sites', compact('listaOrgaos', 'listaSites'));
    }

    public function inserir(Request $request){
      $dados = $request->except('_token');
      $count = Site::where('no_site', $request->no_site)->count();
      if($count == 0){
        $insert = Site::insert($dados);
        if($insert){
          \Session::flash('retorno', ['tipo'=>'success', 'msg'=>'Cadastro efetuado com sucesso']);
          return redirect()->back();
        }
        else{
          \Session::flash('retorno', ['tipo'=>'warning', 'msg'=>'Não foi possível efetuar cadastro.']);
          return redirect()->back();
        }
      }
      else{
        \Session::flash('retorno', ['tipo'=>'warning', 'msg'=>'Já existe um site de mesmo nome.']);
        return redirect()->back();
      }
    }
    // fim inserir

    public function detalhar($id){
      $site = Site::where('id', $id)->get();
      $orgao = Orgao::where('id', $site[0]->orgao_id)->get();
      $unidade = Unidade::where('id', $site[0]->unidade_id)->get();
      return view('site/site', compact('site', 'orgao', 'unidade'));
    }
}
