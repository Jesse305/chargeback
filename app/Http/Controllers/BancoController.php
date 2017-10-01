<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;

class BancoController extends Controller
{
    public function listar()
    {
        $listaBanco = Banco::all();

        return view('banco/bancos', compact('listaBanco'));
    }

    public function inserir(Request $request)
    {
        $dados = $request->except('_token');

        $count = Banco::where('schema_banco', $request->schema_banco)->
        where('ambiente_banco', $request->ambiente_banco)->count();

        if($count == 0)
        {
            $banco = new Banco();
            $banco->fill($dados)->save();
            return redirect()->route('bancos')->
            with('retorno', ['tipo' => 'success', 'msg' => 'Registro inserido com sucesso!']);
        }
        else
        {
            return redirect()->
            route('bancos')->
            with('retorno', ['tipo'=>'warning', 'msg'=>'Já existe o Schema informado com mesmo Ambiente.'])->
            withInput();
        }
    }

    public function detalhar($id)
    {
        $banco = Banco::findOrFail($id);

        return view('banco/banco', compact('banco'));
    }

    public function altera($id)
    {
        $banco = Banco::findOrFail($id);
        return view('banco/altera_banco', compact('banco'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->except('_token');
        $banco = new Banco();
        $banco->findOrFail($id)->update($dados);
        return redirect()->route('bancos')->
        with('retorno', ['tipo' => 'success', 'msg' => 'Registro alterado com sucesso!']);
    }

    public function apagar($id)
    {
        Banco::findOrFail($id)->delete();
        return redirect()->back()->
        with('retorno', ['tipo' => 'success', 'msg' => 'Registro apagado com sucesso!']);
    }
}
