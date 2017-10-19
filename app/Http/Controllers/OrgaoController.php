<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orgao;

class OrgaoController extends Controller
{
    public function listar()
    {
        return view('orgao/orgaos', [
            'orgaos' => Orgao::orderBy('no_orgao')->get(),
         ]);
    }

    public function inserir(Request $request)
    {
        $dados = $request->all();

        $count = Orgao::where('no_orgao', $request->no_orgao)->count();

        if ($count == 0) {
            Orgao::create($dados);

            return redirect()
                ->back()
                ->with('retorno', [
                    'tipo' => 'success',
                    'msg' => 'Cadastro efetuado com sucesso.',
                ]);
        } else {
            return redirect()
                ->back()
                ->with('retorno', [
                    'tipo' => 'warning',
                    'msg' => 'Já existe órgão de mesmo nome!',
                ])->withInput();
        }
    }

    public function detalhar(Orgao $orgao)
    {
        return view('orgao/orgao', [
            'orgao' => $orgao,
         ]);
    }

    public function listarJson()
    {
        $orgaosJson = Orgao::orderBy('no_orgao')->get();
        echo json_encode($orgaosJson, JSON_UNESCAPED_UNICODE);
    }

    public function altera(Orgao $orgao)
    {
        return view('orgao/altera_orgao', [
            'orgao' => $orgao,
         ]);
    }

    public function atualizar(Request $request, Orgao $orgao)
    {
        $dados = $request->all();
        $orgao->update($dados);

        return redirect()
            ->route('orgaos')
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro alterado com sucesso',
            ]);
    }

    public function apagar(Orgao $orgao)
    {
        $orgao->delete();

        return redirect()
            ->back()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro apagado com sucesso.',
            ]);
    }
}
