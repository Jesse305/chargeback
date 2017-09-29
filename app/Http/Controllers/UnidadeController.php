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
        $unidades = Unidade::orderBy('no_unidade')->get();
        $orgaos = Orgao::orderBy('no_orgao')->get();
        $cidades = DB::table('cidade')->orderBy('no_cidade')->get();

        return view('unidade/unidades', compact('unidades', 'orgaos', 'cidades'));
    }

    public function detalhar($id)
    {
        $unidade = Unidade::where('id', $id)->get();
        $orgao = Orgao::where('id', $unidade[0]->orgao_id)->get();
        $cidade = DB::table('cidade')->where('id', $unidade[0]->cidade_id)->get();

        return view('unidade/unidade', compact('unidade', 'orgao', 'cidade'));
    }

    public function inserir(Request $request)
    {
        $dados = $request->except('_token');

        $count = Unidade::where('orgao_id', $request->orgao_id)->where('no_unidade', $request->no_unidade)->count();

        if ($count == 0) {
            $insere = Unidade::insert($dados);
            if ($insere) {
                \Session::flash('retorno', ['tipo' => 'success', 'msg' => 'Unidade cadastrada com sucesso!']);

                return redirect()->back();
            } else {
                \Session::flash('retorno', ['tipo' => 'warning', 'msg' => 'Não foi possível cadastrar unidade!']);

                return redirect()->back();
            }
        } else {
            \Session::flash('retorno', ['tipo' => 'warning', 'msg' => 'Orgão já possui unidade de mesmo nome!']);

            return redirect()->back();
        }
    }

    public function altera($id)
    {
        $unidade = Unidade::where('id', $id)->get();
        $orgao = Orgao::where('id', $unidade[0]->orgao_id)->get();
        $cidades = DB::table('cidade')->orderBy('no_cidade')->get();

        return view('unidade/altera_unidade', compact('unidade', 'orgao', 'cidades'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->except(['_token', 'no_orgao']);
        $update = Unidade::where('id', $id)->update($dados);
        if ($update) {
            \Session::flash('retorno', ['tipo' => 'success', 'msg' => 'Cadastro alterado com sucesso!']);

            return redirect()->route('unidades');
        } else {
            \Session::flash('retorno', ['tipo' => 'warning', 'msg' => 'O cadastro não foi alterado!']);

            return redirect()->route('unidades');
        }
    }

    public function apagar($id)
    {
        $delete = Unidade::find($id)->delete();

        if ($delete) {
            \Session::flash('retorno', ['tipo' => 'success', 'msg' => 'Cadastro excluído com sucesso!']);

            return redirect()->back();
        } else {
            \Session::flash('retorno', ['tipo' => 'warning', 'msg' => 'Não foi possível excluir cadastro!']);

            return redirect()->back();
        }
    }
}
