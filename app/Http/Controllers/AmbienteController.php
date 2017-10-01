<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ambiente;

class AmbienteController extends Controller
{
    public function listar()
    {
        $listaAmbientes = Ambiente::all();

        return view('ambiente/ambientes', compact('listaAmbientes'));
    }

    public function inserir(Request $request)
    {
        $dados = $request->except(['_token']);
        $amb = new Ambiente();
        $amb->fill($dados)->save();

        return redirect()->back()->
        with('retorno', ['tipo' => 'success', 'msg' => 'Registro inserido com sucesso!']);
    }

    public function detalhar($id)
    {
        $ambiente = Ambiente::findOrFail($id);

        return view('ambiente/ambiente', compact('ambiente'));
    }

    public function altera($id)
    {
        $ambiente = Ambiente::findOrFail($id);

        return view('ambiente/altera_ambiente', compact('ambiente'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->except('_token');
        $amb = new Ambiente();
        $amb->findOrFail($id)->update($dados);

        return redirect()->route('ambientes')->
        with('retorno', ['tipo' => 'success', 'msg' => 'Registro alterado com sucesso!']);
    }

    public function apagar($id)
    {
        Ambiente::findOrFail($id)->delete();

        return redirect()->back()->
        with('retorno', ['tipo' => 'success', 'msg' => 'Registro apagado com sucesso!']);
    }
}
