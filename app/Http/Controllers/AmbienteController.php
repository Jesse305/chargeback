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
        Ambiente::create($dados);

        return redirect()
            ->back()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro inserido com sucesso!',
            ]);
    }

    public function detalhar(Ambiente $ambiente)
    {
        return view('ambiente/ambiente', [
            'ambiente' => $ambiente,
        ]);
    }

    public function altera(Ambiente $ambiente)
    {
        return view('ambiente/altera_ambiente', [
            'ambiente' => $ambiente,
        ]);
    }

    public function atualizar(Request $request, Ambiente $ambiente)
    {
        $dados = $request->all();
        $ambiente->update($dados);

        return redirect()
            ->route('ambientes')
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro alterado com sucesso!',
            ]);
    }

    public function apagar(Ambiente $ambiente)
    {
        $ambiente->delete();

        return redirect()
            ->back()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro apagado com sucesso!',
            ]);
    }
}
