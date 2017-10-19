<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Framework;

class FrameworkController extends Controller
{
    public function listar()
    {
        $listaFrameworks = Framework::all();

        return view('framework/frameworks', compact('listaFrameworks'));
    }

    public function inserir(Request $request)
    {
        $dados = $request->except(['_token']);
        $count = Framework::where('no_framework', $request->no_framework)->count();

        if ($count == 0) {
            $frame = new Framework();
            $frame->fill($dados);
            $frame->save();

            return redirect()->back()->
            with('retorno', ['tipo' => 'success', 'msg' => 'Registro inserido com sucesso!']);
        } else {
            return redirect()->back()->
            with('retorno', ['tipo' => 'warning', 'msg' => 'Framework já possui registro!']);
        }
    }

    public function altera($id)
    {
        $framework = Framework::findOrFail($id);

        return view('/framework/altera_framework', compact('framework'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->except('_token');
        $frame = new Framework();
        $frame->findOrFail($id)->update($dados);

        return redirect()->route('frameworks')->
        with('retorno', ['tipo' => 'success', 'msg' => 'Registro alterado com sucesso!']);
    }

    public function apagar($id)
    {
        Framework::findOrFail($id)->delete();

        return redirect()->back()->with('retorno', ['tipo' => 'success', 'msg' => 'Registro apagado com sucesso!']);
    }
}
