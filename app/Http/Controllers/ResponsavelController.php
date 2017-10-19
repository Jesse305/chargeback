<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Responsavel;
use App\Orgao;
use App\Unidade;

class ResponsavelController extends Controller
{
    //pelo id da unidade
    public function respsByIdJson($id)
    {
        $respByIdJson = Responsavel::where('unidade_id', $id)->get();
        echo json_encode($respByIdJson, JSON_UNESCAPED_UNICODE);
    }

    public function listar()
    {
        return view('responsavel/responsaveis', [
            'responsaveis' => Responsavel::orderBy('no_responsavel')->get(),
            'orgaos' => Orgao::orderBy('no_orgao')->get(),
         ]);
    }

    public function inserir(Request $request)
    {
        $dados = $request->all();
        $count = Responsavel::where('no_responsavel', $request->no_responsavel)->
        where('unidade_id', $request->unidade_id)->count();
        if ($count == 0) {
            Responsavel::create($dados);

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
                    'msg' => 'Já existe um responsavel de mesmo nome na unidade selecionada.',
                ])->withInput();
        }
    }

    // fim inserir

    public function detalha(Responsavel $responsavel)
    {
        return view('responsavel/responsavel', [
            'responsavel' => $responsavel,
            'orgao' => Orgao::findOrFail($responsavel->orgao_id),
            'unidade' => Unidade::findOrFail($responsavel->unidade_id),
         ]);
    }

    // fim detalha

    public function altera(Responsavel $responsavel)
    {
        return view('responsavel/altera_responsavel', [
            'responsavel' => $responsavel,
            'orgao' => Orgao::findOrFail($responsavel->orgao_id),
            'unidade' => Unidade::findOrFail($responsavel->unidade_id),
         ]);
    }

    public function atualizar(Request $request, Responsavel $responsavel)
    {
        $dados = $request->all();
        $responsavel->update($dados);

        return redirect()
            ->route('responsaveis')
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Cadastro alterado com sucesso.',
            ]);
    }

    public function apagar(Responsavel $responsavel)
    {
        $responsavel->delete();

        return redirect()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Cadastro apagado com sucesso!',
            ]);
    }
}
