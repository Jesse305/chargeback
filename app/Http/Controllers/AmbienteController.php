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
        $dados = $request->except(['_token', '_insert']);
        Ambiente::insert($dados);
        \Session::flash('retorno', ['tipo' => 'success', 'msg' => 'Registro inserido com sucesso!']);

        return redirect()->back();
    }

    public function detalhar($id)
    {
        $ambiente = Ambiente::where('id', $id)->get();

        return view('ambiente/ambiente', compact('ambiente'));
    }

    public function altera($id)
    {
        $ambiente = Ambiente::where('id', $id)->get();

        return view('ambiente/altera_ambiente', compact('ambiente'));
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->except(['_token', '_update']);
        Ambiente::where('id', $id)->update($dados);
        \Session::flash('retorno', ['tipo' => 'success', 'msg' => 'Registro alterado com sucesso!']);

        return redirect()->route('ambientes');
    }

    public function apagar($id)
    {
        Ambiente::find($id)->delete();
        \Session::flash('retorno', ['tipo' => 'success', 'msg' => 'Registro apagado com sucesso!']);

        return redirect()->back();
    }
}
