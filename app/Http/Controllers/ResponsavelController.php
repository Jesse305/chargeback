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
        $responsaveis = Responsavel::orderBy('no_responsavel')->get();
        $orgaos = Orgao::orderBy('no_orgao')->get();

        return view('responsavel/responsaveis', compact('responsaveis', 'orgaos'));
    }

    public function inserir(Request $request)
    {
        $dados = $request->except('_token');
        $count = Responsavel::where('no_responsavel', $request->no_responsavel)->
        where('unidade_id', $request->unidade_id)->count();
        if ($count == 0) {
            $resp = new Responsavel();
            $resp->fill($dados)->save();

            return redirect()->back()->
            with('retorno', ['tipo' => 'success', 'msg' => 'Cadastro efetuado com sucesso.']);
        } else {
            return redirect()->back()->
            with('retorno', ['tipo' => 'warning', 'msg' => 'Já existe um responsavel de mesmo nome na unidade selecionada.'])->
            withInput();
        }
    }

    // fim inserir

    public function detalha($id)
    {
        $responsavel = Responsavel::findOrFail($id);
        $orgao = Orgao::findOrFail($responsavel->orgao_id);
        $unidade = Unidade::findOrFail($responsavel->unidade_id);

        return view('responsavel/responsavel', compact('responsavel', 'orgao', 'unidade'));
    }

    // fim detalha

    public function altera($id)
    {
        $responsavel = Responsavel::findOrFail($id);
        $orgao = Orgao::findOrFail($responsavel->orgao_id);
        $unidade = Unidade::findOrFail($responsavel->unidade_id);

        return view('responsavel/altera_responsavel', compact('responsavel', 'orgao', 'unidade'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->except('_token');
        $resp = new Responsavel();
        $resp->findOrFail($id)->update($dados);

        return redirect()->route('responsaveis')->
        with('retorno', ['tipo' => 'success', 'msg' => 'Cadastro alterado com sucesso.']);
    }

    public function apagar($id)
    {
        Responsavel::findOrFail($id)->delete();

        return redirect()->with('retorno', ['tipo' => 'success', 'msg' => 'Cadastro apagado com sucesso!']);
    }
}
