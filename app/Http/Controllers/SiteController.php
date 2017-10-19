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
        $dados = $request->all();
        $count = Site::where('no_site', $request->no_site)->count();
        if ($count == 0) {
            $site = new Site();
            $site->fill($dados)->save();

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

    // fim inserir

    public function detalhar(Site $site)
    {
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

    public function altera(Site $site)
    {
        return view('site/altera_site', [
            'site' => $site,
            'listaOrgaos' => Orgao::orderBy('no_orgao')->get(),
            'unidade' => Unidade::where('id', $site->unidade_id)->first(),
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
