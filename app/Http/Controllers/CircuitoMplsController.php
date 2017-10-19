<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CircuitoMpls;
use App\Orgao;
use App\ItemConfig;
use Validator;

class CircuitoMplsController extends Controller
{
    public function listar()
    {
        return view('circuito_mpls/circuitos_mpls', [
            'circuitos' => CircuitoMpls::all(),
         ]);
    }

    public function detalhar(CircuitoMpls $circuito)
    {
        return view('circuito_mpls/circuito_mpls', [
            'circuito' => $circuito,
         ]);
    }

    public function novo()
    {
        $orgaos = Orgao::orderBy('no_orgao')->get(['id', 'no_orgao', 'no_sigla']);
        $itensConfig = ItemConfig::where('categoriaitem_id', 4)
        ->where('no_item', 'LIKE', '%MPLS%')
        ->orderBy('id')->get(['id', 'no_item']);

        return view('circuito_mpls/novo_circuito_mpls', [
            'orgaos' => $orgaos,
            'itensConfig' => $itensConfig,
        ]);
    }

    public function valida($dados)
    {
        $rules = [
            'orgao_id' => 'required',
            'unidade_id' => 'required',
            'responsavel_id' => 'required',
            'itemdeconfiguracao_id' => 'required',
            'no_designacao' => 'required',
        ];

        $messages = [
            'orgao_id.required' => 'Selecione o Órgão',
            'unidade_id.required' => 'Selecione a Unidade',
            'responsavel_id.required' => 'Selecione o Responsável',
            'itemdeconfiguracao_id.required' => 'Selecione o Item de Configuração',
            'no_designacao.required' => 'Informe a Designação',
        ];

        return Validator::make($dados, $rules, $messages)->validate();
    }

    public function inserir(Request $request)
    {
        $this->valida($request->all());
        $dados = $request->all();
        CircuitoMpls::create($dados);

        return redirect()
            ->route('circuitos_mpls')
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Cadastro efetuado com sucesso.',
            ]);
    }

    public function altera(CircuitoMpls $circuito)
    {
        $orgaos = Orgao::orderBy('no_orgao')->get(['id', 'no_orgao', 'no_sigla']);
        $itensConfig = ItemConfig::where('categoriaitem_id', 4)
        ->where('no_item', 'LIKE', '%MPLS%')
        ->orderBy('id')->get(['id', 'no_item']);

        return view('circuito_mpls/alt_circuito_mpls', [
            'circuito' => $circuito,
            'orgaos' => $orgaos,
            'itensConfig' => $itensConfig,
        ]);
    }

    public function atualizar(Request $request, CircuitoMpls $circuito)
    {
        $this->valida($request->all());
        $dados = $request->all();
        $circuito->update($dados);

        return redirect()
            ->route('circuitos_mpls')
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Cadastro alterado com sucesso.',
            ]);
    }

    public function apagar(CircuitoMpls $circuito)
    {
        $circuito->delete();

        return redirect()
            ->back()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Cadastro excluído com sucesso.',
            ]);
    }
}
