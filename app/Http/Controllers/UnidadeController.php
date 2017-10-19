<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Unidade;
use App\Orgao;

class UnidadeController extends Controller
{
    public function unidadeByIdJson($id_orgao)
    {
        $unidadeByIdJson = Unidade::where('orgao_id', '=', $id_orgao)->get();
        echo json_encode($unidadeByIdJson, JSON_UNESCAPED_UNICODE);
    }

    public function listar()
    {
        return view('unidade/unidades', [
            'unidades' => Unidade::orderBy('no_unidade')->get(),
            'orgaos' => Orgao::orderBy('no_orgao')->get(),
            'cidades' => DB::table('cidade')->orderBy('no_cidade')->get(),
         ]);
    }

    public function detalhar($id)
    {
        $cidade = DB::table('cidade')->where('id', $unidade->cidade_id)->first();

        return view('unidade/unidade', [
            'unidade' => Unidade::findOrFail($id),
            'orgao' => Orgao::findOrFail($unidade->orgao_id),
            'cidade' => $cidade,
         ]);
    }

    public function inserir(Request $request)
    {
        $dados = $request->except('_token');

        $count = Unidade::where('orgao_id', $request->orgao_id)->
        where('no_unidade', $request->no_unidade)->count();

        if ($count == 0) {
            $unidade = new Unidade();
            $unidade->fill($dados)->save();

            return redirect()->back()->
            with('retorno', ['tipo' => 'success', 'msg' => 'Cadastro inserido com sucesso.']);
        } else {
            return redirect()->back()->
            with('retorno', ['tipo' => 'warning', 'msg' => 'Orgão já possui unidade de mesmo nome!'])->
            withInput();
        }
    }

    public function altera($id)
    {
        return view('unidade/altera_unidade', [
            'unidade' => Unidade::findOrFail($id),
            'orgao' => Orgao::findOrFail($unidade->orgao_id),
            'cidades' => DB::table('cidade')->orderBy('no_cidade')->get(),
         ]);
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->except(['_token', 'no_orgao']);
        $unidade = new Unidade();
        $unidade->findOrFail($id)->update($dados);
        $update = Unidade::where('id', $id)->update($dados);

        return redirect()->route('unidades')->
        with('retorno', ['tipo' => 'success', 'msg' => 'Cadastro alterado com sucesso!']);
    }

    public function apagar($id)
    {
        $delete = Unidade::findOrFail($id)->delete();

        return redirect()->back()->
        with('retorno', ['tipo' => 'success', 'msg' => 'Registro deletado com sucesso.']);
    }
}
