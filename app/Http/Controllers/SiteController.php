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
        return view('site/sites', [
            'listaOrgaos' => Orgao::orderBy('no_orgao')->get(),
            'listaSites' => Site::orderBy('no_site')->get(),
         ]);
    }

    public function inserir(Request $request)
    {
        $dados = $request->except('_token');
        $count = Site::where('no_site', $request->no_site)->count();
        if ($count == 0) {
            $site = new Site();
            $site->fill($dados)->save();

            return redirect()->back()->
            with('retorno', ['tipo' => 'success', 'msg' => 'Cadastro efetuado com sucesso.']);
        } else {
            return redirect()->back()->
            with('retorno', ['tipo' => 'warning', 'msg' => 'Já existe um site de mesmo nome.'])->
            withInput();
        }
    }

    // fim inserir

    public function detalhar($id)
    {
        $site = Site::findOrFail($id);
        $unidade = Unidade::where('id', $site->unidade_id)->first();
        $responsaveis = $unidade ?
            Responsavel::where('unidade_id', $unidade->id)->get() :
            [];

        return view('site/site', [
            'site' => $site,
            'orgao' => Orgao::where('id', $site->orgao_id)->first(),
            'unidade' => $unidade,
            'responsaveis' => $responsaveis,
        ]);
    }

    // fim detalhar

    public function altera($id)
    {
        return view('site/altera_site', [
            'site' => Site::findOrFail($id),
            'listaOrgaos' => Orgao::orderBy('no_orgao')->get(),
            'unidade' => Unidade::where('id', $site->unidade_id)->first(),
         ]);
    }

    public function atualizar($id, Request $request)
    {
        $dados = $request->except('_token');
        $site = new Site();
        $site->findOrFail($id)->update($dados);

        return redirect()->route('sites')->
        with('retorno', ['tipo' => 'success', 'msg' => 'Cadastro alterado com sucesso.']);
    }

    public function apagar($id)
    {
        Site::findOrFail($id)->delete();

        return redirect()->back()->
        with('retorno', ['tipo' => 'success', 'msg' => 'Cadastro excluído com sucesso.']);
    }
}
