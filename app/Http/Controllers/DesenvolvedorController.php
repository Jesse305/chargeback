<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desenvolvedor;

class DesenvolvedorController extends Controller
{
    public function listar()
    {
        return view('dev/desenvolvedores', [
            'listaDevs' => Desenvolvedor::all(),
         ]);
    }

    public function inserir(Request $request)
    {
        $dados = $request->all();
        $count = Desenvolvedor::where('no_dev', $request->no_dev)->count();
        if ($count == 0) {
            Desenvolvedor::create($dados);

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
                    'msg' => 'Desenvolvedor já possui cadastro!',
                ])->withInput();
        }
    }

    public function altera(Desenvolvedor $dev)
    {
        return view('dev/altera_desenvolvedor', [
            'des' => $dev,
         ]);
    }

    public function atualizar(Request $request, Desenvolvedor $dev)
    {
        $dados = $request->except(['_token', '_update']);
        $dev->update($dados);

        return redirect()
            ->route('desenvolvedores')
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro alterado com sucesso!',
            ]);
    }

    public function apagar(Desenvolvedor $dev)
    {
        $dev->delete();

        return redirect()
            ->back()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro apagado com sucesso!',
            ]);
    }
}
