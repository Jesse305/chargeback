<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ambiente;

class AmbienteController extends Controller
{
    public function listar()
    {
        return view('ambiente/ambientes', [
            'listaAmbientes' => Ambiente::all(),
        ]);
    }

    public function inserir(Request $request)
    {
        $dados = $request->all();
        $amb = new Ambiente();
        $amb->fill($dados)->save();

        return redirect()
            ->back()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro inserido com sucesso!',
            ]);
    }

    public function detalhar($id)
    {
        return view('ambiente/ambiente', [
            'ambiente' => Ambiente::findOrFail($id),
        ]);
    }

    public function altera($id)
    {
        return view('ambiente/altera_ambiente', [
            'ambiente' => Ambiente::findOrFail($id),
        ]);
    }

    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();
        $amb = new Ambiente();
        $amb->findOrFail($id)->update($dados);

        return redirect()
            ->route('ambientes')
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro alterado com sucesso!',
            ]);
    }

    public function apagar($id)
    {
        Ambiente::findOrFail($id)->delete();

        return redirect()
            ->back()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro apagado com sucesso!',
            ]);
    }
}
