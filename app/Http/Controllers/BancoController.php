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

    public function bancosJson(){

        $bancos = Banco::orderBy('schema_banco')->get();

        echo json_encode($bancos, JSON_UNESCAPED_UNICODE);
    }

    public function inserir(Request $request)
    {
        $dados = $request->all();

        $count = Banco::where('schema_banco', $request->schema_banco)->
        where('ambiente_banco', $request->ambiente_banco)->count();

        if ($count == 0) {
            Banco::create($dados);

            return redirect()
                ->route('bancos')
                ->with('retorno', [
                    'tipo' => 'success',
                    'msg' => 'Registro inserido com sucesso!',
                ]);
        } else {
            return redirect()
                ->route('bancos')
                ->with('retorno', [
                    'tipo' => 'warning',
                    'msg' => 'Já existe o Schema informado com mesmo Ambiente.',
                ])->withInput();
        }
    }

    public function detalhar(Banco $banco)
    {
        return view('banco/banco', [
            'banco' => $banco,
         ]);
    }

    public function altera(Banco $banco)
    {
        return view('banco/altera_banco', [
            'banco' => $banco,
         ]);
    }

    public function atualizar(Request $request, Banco $banco)
    {
        $dados = $request->all();
        $banco->update($dados);

        return redirect()
            ->route('bancos')
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro alterado com sucesso!',
            ]);
    }

    public function apagar(Banco $banco)
    {
        $banco->delete();

        return redirect()
            ->back()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro apagado com sucesso!',
            ]);
    }
}
