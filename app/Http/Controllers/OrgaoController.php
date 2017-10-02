<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orgao;

class OrgaoController extends Controller
{
    public function listar()
    {
        $orgaos = Orgao::orderBy('no_orgao')->get();

        return view('orgao/orgaos', compact('orgaos'));
    }

    public function inserir(Request $request)
    {
        $dados = $request->except('_token');

        $count = Orgao::where('no_orgao', $request->no_orgao)->count();

        if ($count == 0) {
            $orgao = new Orgao();
            $orgao->fill($dados)->save();

            return redirect()->back()->
            with('retorno', ['tipo' => 'success', 'msg' => 'Cadastro efetuado com sucesso.']);
        } else {
            \Session::flash('retorno', ['tipo' => 'warning', 'msg' => 'Já existe órgão de mesmo nome!']);

            return redirect()->back()->
            with('retorno', ['tipo' => 'warning', 'msg' => 'Já existe órgão de mesmo nome!'])->
            withInput();
        }
    }

    //fim insere

    public function detalhar($id)
    {
        $orgao = Orgao::findOrfail($id);

        return view('orgao/orgao', compact('orgao'));
    }

    public function listarJson()
    {
        $orgaosJson = Orgao::orderBy('no_orgao')->get();
        echo json_encode($orgaosJson, JSON_UNESCAPED_UNICODE);
    }

    public function altera($id)
    {
        $orgao = Orgao::findOrfail($id);

        return view('orgao/altera_orgao', compact('orgao'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->except('_token');
        
        $orgao = new Orgao();
        $orgao->findOrfail($id)->update($dados);

        return redirect()->route('orgaos')->
        with('retorno', ['tipo'=>'success', 'msg'=>'Registro alterado com sucesso']);
    }

    public function apagar($id)
    {
        $delete = Orgao::findOrfail($id)->delete();

        return redirect()->back()->
        with('retorno', ['tipo' => 'success', 'msg' => 'Registro apagado com sucesso.']);
    }
}
