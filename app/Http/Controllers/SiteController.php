<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orgao;
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
        $dados = $request->all();
        $count = Site::where('no_site', $request->no_site)->count();
        if ($count == 0) {
            Site::create($dados);

            return redirect()
                ->back()
                ->with('retorno', [
                    'tipo' => 'success',
                    'msg' => 'Cadastro efetuado com sucesso.',
                ]);
        } else {
            return redirect()
                ->back()
                ->with('retorno', [
                    'tipo' => 'warning',
                    'msg' => 'Já existe um site de mesmo nome.',
                ])->withInput();
        }
    }

    public function detalhar(Site $site)
    {
        $responsaveis = $site->unidade ?
            Responsavel::where('unidade_id', $site->unidade->id)->get() :
            [];

        return view('site/site', [
            'site' => $site,
            'responsaveis' => $responsaveis,
        ]);
    }

    public function altera(Site $site)
    {
        return view('site/altera_site', [
            'site' => $site,
            'listaOrgaos' => Orgao::orderBy('no_orgao')->get(),
         ]);
    }

    public function atualizar(Request $request, Site $site)
    {
        $dados = $request->all();
        $site->update($dados);

        return redirect()
            ->route('sites')
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Cadastro alterado com sucesso.',
            ]);
    }

    public function apagar(Site $site)
    {
        $site->delete();

        return redirect()
            ->back()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Cadastro excluído com sucesso.',
            ]);
    }
}
