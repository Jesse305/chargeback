<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Framework;

class FrameworkController extends Controller
{
    public function listar()
    {
        return view('framework/frameworks', [
            'listaFrameworks' => Framework::all(),
         ]);
    }

    public function inserir(Request $request)
    {
        $dados = $request->all();
        $count = Framework::where('no_framework', $request->no_framework)->count();

        if ($count == 0) {
            Framework::create($dados);

            return redirect()
                ->back()
                ->with('retorno', [
                    'tipo' => 'success',
                    'msg' => 'Registro inserido com sucesso!',
                ]);
        } else {
            return redirect()
                ->back()
                ->with('retorno', [
                    'tipo' => 'warning',
                    'msg' => 'Framework já possui registro!',
                ]);
        }
    }

    public function altera(Framework $framework)
    {
        return view('/framework/altera_framework', [
            'framework' => $framework,
         ]);
    }

    public function atualizar(Request $request, Framework $framework)
    {
        $dados = $request->all();
        $framework->update($dados);

        return redirect()
            ->route('frameworks')
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro alterado com sucesso!',
            ]);
    }

    public function apagar(Framework $framework)
    {
        $framework->delete();

        return redirect()
            ->back()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro apagado com sucesso!',
            ]);
    }
}
