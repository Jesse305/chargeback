<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orgao;
use App\Unidade;
use App\Responsavel;
use App\Site;

class SiteController extends Controller
{
    public function listar()
    {
        $listaOrgaos = Orgao::orderBy('no_orgao')->get();
        $listaSites = Site::orderBy('no_site')->get();

        return view('site/sites', compact('listaOrgaos', 'listaSites'));
    }

    public function inserir(Request $request)
    {
        $dados = $request->except('_token');
        $count = Site::where('no_site', $request->no_site)->count();
        if ($count == 0) {
            $insert = Site::insert($dados);
            if ($insert) {
                \Session::flash('retorno', ['tipo' => 'success', 'msg' => 'Cadastro efetuado com sucesso']);

                return redirect()->back();
            } else {
                \Session::flash('retorno', ['tipo' => 'warning', 'msg' => 'Não foi possível efetuar cadastro.']);

                return redirect()->back();
            }
        } else {
            \Session::flash('retorno', ['tipo' => 'warning', 'msg' => 'Já existe um site de mesmo nome.']);

            return redirect()->back();
        }
    }

    // fim inserir

    public function detalhar($id)
    {
        $site = Site::where('id', $id)->get();
        $orgao = Orgao::where('id', $site[0]->orgao_id)->get();
        $unidade = Unidade::where('id', $site[0]->unidade_id)->get();
        if (sizeof($unidade) > 0) {
            $responsaveis = Responsavel::where('unidade_id', $unidade[0]->id)->get();
        }

        return view('site/site', compact('site', 'orgao', 'unidade', 'responsaveis'));
    }

    // fim detalhar

    public function altera($id)
    {
        $site = Site::where('id', $id)->get();
        $listaOrgaos = Orgao::orderBy('no_orgao')->get();
        $unidade = Unidade::where('id', $site[0]->unidade_id)->get();

        return view('site/altera_site', compact('site', 'listaOrgaos', 'unidade'));
    }

    public function atualizar($id, Request $request)
    {
        $dados = $request->except('_token');
        $update = Site::where('id', $id)->update($dados);
        if ($update) {
            \Session::flash('retorno', ['tipo' => 'success', 'msg' => 'Cadastro alterado com sucesso.']);

            return redirect()->route('sites');
        } else {
            \Session::flash('retorno', ['tipo' => 'warning', 'msg' => 'Cadastro não foi alterado.']);

            return redirect()->route('sites');
        }
    }

    public function apagar($id)
    {
        $delete = Site::where('id', $id)->delete();
        if ($delete) {
            \Session::flash('retorno', ['tipo' => 'success', 'msg' => 'Cadastro excluído com sucesso.']);

            return redirect()->back();
        } else {
            \Session::flash('retorno', ['tipo' => 'warning', 'msg' => 'Cadastro não excluído.']);

            return redirect()->back();
        }
    }
}
