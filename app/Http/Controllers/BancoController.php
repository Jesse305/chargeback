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
        $dados = $request->except(['_token', '_insert']);
        Banco::insert($dados);
        \Session::flash('retorno', ['tipo' => 'success', 'msg' => 'Registro inserido com sucesso!']);

        return redirect()->route('bancos');
    }

    public function detalhar($id)
    {
        $banco = Banco::where('id_banco', $id)->get();

        return view('banco/banco', compact('banco'));
    }

    public function altera($id)
    {
        $banco = Banco::where('id_banco', $id)->get();

        return view('banco/altera_banco', compact('banco'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->except(['_token', '_update']);
        Banco::where('id_banco', '=', $id)->update($dados);
        \Session::flash('retorno', ['tipo' => 'success', 'msg' => 'Registro alterado com sucesso!']);

        return redirect()->route('bancos');
    }

    public function apagar($id)
    {
        Banco::find($id)->delete();
        \Session::flash('retorno', ['tipo' => 'success', 'msg' => 'Registro apagado com sucesso!']);

        return redirect()->back()->with('delete', ['deletado']);
    }
}
