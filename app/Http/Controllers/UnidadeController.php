<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Unidade;
use App\Orgao;

class UnidadeController extends Controller
{
    public function unidadeByIdJson($id_orgao)
    {
        return Unidade::where('orgao_id', '=', $id_orgao)->get();
    }

    public function listar()
    {
        return view('unidade/unidades', [
            'unidades' => Unidade::orderBy('no_unidade')->get(),
            'orgaos' => Orgao::orderBy('no_orgao')->get(),
            'cidades' => DB::table('cidade')->orderBy('no_cidade')->get(),
         ]);
    }

    public function detalhar(Unidade $unidade)
    {
        $cidade = DB::table('cidade')->where('id', $unidade->cidade_id)->first();

        return view('unidade/unidade', [
            'unidade' => $unidade,
            'cidade' => $cidade,
         ]);
    }

    public function inserir(Request $request)
    {
        $dados = $request->all();

        $count = Unidade::where('orgao_id', $request->orgao_id)->
        where('no_unidade', $request->no_unidade)->count();

        if ($count == 0) {
            Unidade::create($dados);

            return redirect()
                ->back()
                ->with('retorno', [
                    'tipo' => 'success',
                    'msg' => 'Cadastro inserido com sucesso.',
                ]);
        } else {
            return redirect()
                ->back()
                ->with('retorno', [
                    'tipo' => 'warning',
                    'msg' => 'Orgão já possui unidade de mesmo nome!',
                ])->withInput();
        }
    }

    public function altera(Unidade $unidade)
    {
        return view('unidade/altera_unidade', [
            'unidade' => $unidade,
            'cidades' => DB::table('cidade')->orderBy('no_cidade')->get(),
         ]);
    }

    public function atualizar(Request $request, Unidade $unidade)
    {
        $dados = $request->all();
        $unidade->update($dados);

        return redirect()
            ->route('unidades')
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Cadastro alterado com sucesso!',
            ]);
    }

    public function apagar(Unidade $unidade)
    {
        $unidade->delete();

        return redirect()
            ->back()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro deletado com sucesso.',
            ]);
    }
}
