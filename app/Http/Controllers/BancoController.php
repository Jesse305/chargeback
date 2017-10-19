<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;

class BancoController extends Controller
{
    public function listar()
    {
        return view('banco/bancos', [
            'listaBanco' => Banco::all(),
         ]);
    }

    public function inserir(Request $request)
    {
        $dados = $request->except('_token');

        $count = Banco::where('schema_banco', $request->schema_banco)->
        where('ambiente_banco', $request->ambiente_banco)->count();

        if ($count == 0) {
            $banco = new Banco();
            $banco->fill($dados)->save();

            return redirect()->route('bancos')->
            with('retorno', ['tipo' => 'success', 'msg' => 'Registro inserido com sucesso!']);
        } else {
            return redirect()->
            route('bancos')->
            with('retorno', ['tipo' => 'warning', 'msg' => 'Já existe o Schema informado com mesmo Ambiente.'])->
            withInput();
        }
    }

    public function detalhar($id)
    {
        return view('banco/banco', [
            'banco' => Banco::findOrFail($id),
         ]);
    }

    public function altera($id)
    {
        return view('banco/altera_banco', [
            'banco' => Banco::findOrFail($id),
         ]);
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
