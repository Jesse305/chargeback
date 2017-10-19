<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orgao;
use App\Banco;
use App\Ambiente;
use App\Desenvolvedor;
use App\Framework;
use App\Sistema;
use App\Responsavel;

class SistemaController extends Controller
{
    public function listar()
    {
        return view('sistema/sistemas', [
            'listaOrgaos' => Orgao::orderBy('no_orgao')->get(),
            'listaBancos' => Banco::orderBy('schema_banco')->get(),
            'listaAmbientes' => Ambiente::orderBy('desc_amb')->get(),
            'listaDevs' => Desenvolvedor::orderBy('no_dev')->get(),
            'listaFrames' => Framework::orderBy('no_framework')->get(),
            'listaSistemas' => Sistema::all(),
        ]);
    }

    public function inserir(Request $request)
    {
        $dados = $request->all();

        $count = Sistema::where('no_sistema', $request->no_sistema)->count();

        if ($count > 0) {
            return redirect()->back()->
            with('retorno', ['tipo' => 'warning', 'msg' => 'Já existe Sistema de mesmo Nome!'])->
            withInput();
        } else {
            $sistema = new Sistema($dados);
            if ($sistema->save()) {
                $sistema->desenvolvedores()->sync($request->devs);
                $sistema->frameworks()->sync($request->frames);

                return redirect()
                    ->back()
                    ->with('retorno', [
                        'tipo' => 'success',
                        'msg' => 'Cadastro inserido com sucesso!',
                    ]);
            } else {
                return redirect()
                    ->back()
                    ->with('retorno', [
                        'tipo' => 'danger',
                        'msg' => 'Não foi possível inserir cadastro!',
                    ])->withInput();
            }
        }
    }

    public function detalhar(Sistema $sistema)
    {
        $responsaveis = Responsavel::where('orgao_id', $sistema->orgao->id)->where('unidade_id', $sistema->unidade->id)->get();

        return view('sistema/sistema', [
            'sistema' => $sistema,
            'responsaveis' => $responsaveis,
        ]);
    }

    public function altera(Sistema $sistema)
    {
        return view('sistema/altera_sistema', [
            'sistema' => $sistema,
            'orgaos' => Orgao::orderBy('no_orgao')->get(),
            'bancos' => Banco::orderBy('schema_banco')->get(),
            'ambientes' => Ambiente::orderBy('desc_amb')->get(),
            'devs' => Desenvolvedor::orderBy('no_dev')->get(),
            'frames' => Framework::orderBy('no_framework')->get(),
        ]);
    }

    public function atualizar(Request $request, Sistema $sistema)
    {
        $dados = $request->all();
        $sistema->update($dados);

        $sistema->desenvolvedores()->sync($request->devs);
        $sistema->frameworks()->sync($request->frames);

        return redirect()
            ->route('sistemas')
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Cadastro Atualizado com sucesso.',
            ]);
    }

    public function apagar(Sistema $sistema)
    {
        $sistema->delete();

        return redirect()
            ->back()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Cadastro apagado com sucesso.',
            ]);
    }
}
