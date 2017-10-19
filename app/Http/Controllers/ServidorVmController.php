<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\ServidorVm;
use App\Orgao;
use App\Unidade;
use App\Responsavel;
use App\ItemConfig;

class ServidorVmController extends Controller
{
    public function listar()
    {
        return view('serv_vm/servidores_vm', [
            'servs_vm' => ServidorVm::all(),
        ]);
    }

    public function detalhar(ServidorVm $servVm)
    {
        return view('serv_vm/servidor_vm', [
            'serv_vm' => $servVm,
            'orgao' => Orgao::findOrfail($servVm->orgao_id),
            'unidade' => Unidade::find($servVm->unidade_id),
            'resp' => Responsavel::find($servVm->responsavel_id),
        ]);
    }

    public function viewInsere()
    {
        $clouds = ItemConfig::where('categoriaitem_id', 1)->orderBy('no_item')->get();
        $sis_ops = ItemConfig::where('categoriaitem_id', 2)->orderBy('no_item')->get();

        return view('serv_vm/novo_serv_vm', [
            'orgaos' => Orgao::orderBy('no_orgao')->get(),
            'clouds' => $clouds,
            'sis_ops' => $sis_ops,
         ]);
    }

    private function found($valor)
    {
        $retorno = false;
        $count = ServidorVm::where('no_servidor', $valor)->count();
        if ($count > 0) {
            $retorno = true;
        }

        return $retorno;
    }

    private function validaDados($dados)
    {
        $rules = [
            'orgao_id' => 'required',
            'unidade_id' => 'required',
            'responsavel_id' => 'required',
            'no_servidor' => 'required',
            'ip_endereco' => 'required',
            'no_dns' => 'required',
        ];

        $messages = [
            'orgao_id.required' => 'Selecione o Órgão solicitante.',
            'unidade_id.required' => 'Selecione a Unidade solicitante.',
            'responsavel_id.required' => 'Selecione o Responsavel.',
            'no_servidor.required' => 'Informe um nome para o Servidor VM.',
            'ip_endereco.required' => 'Informe IP do Servidor VM.',
            'no_dns.required' => 'Informe o DNS do Servidor VM.',
        ];

        return Validator::make($dados, $rules, $messages)->validate();
    }

    public function inserir(Request $request)
    {
        if ($this->found($request->no_servidor)) {
            return redirect()
            ->back()
            ->with('retorno', ['tipo' => 'warning', 'msg' => 'Já existe um Servidor VM de Mesmo Nome.'])
            ->withInput();
        } else {
            $this->validaDados($request->all());
            $dados = $request->all();
            $serv_vm = new ServidorVm();
            $serv_vm->fill($dados)->save();

            return redirect()
                ->route('servidores_vm')
                ->with('retorno', [
                    'tipo' => 'success',
                    'msg' => 'Cadastro efetuado com sucesso.',
                ]);
        }
    }

    // fim inserir

    public function altera(ServidorVm $servVm)
    {
        $clouds = ItemConfig::where('categoriaitem_id', 1)->orderBy('no_item')->get();
        $sis_ops = ItemConfig::where('categoriaitem_id', 2)->orderBy('no_item')->get();

        return view('serv_vm/alt_serv_vm', [
            'serv_vm' => $serv_servVmvm,
            'unidade' => Unidade::find($servVm->unidade_id),
            'responsavel' => Responsavel::find($servVm->responsavel_id),
            'orgaos' => Orgao::orderBy('no_orgao')->get(),
            'clouds' => $clouds,
            'sis_ops' => $sis_ops,
        ]);
    }

    // fim altera

    public function atualizar(Request $request, ServidorVm $servVm)
    {
        $this->validaDados($request->all());

        $dados = $request->all();
        $servVm->update($dados);

        return redirect()
            ->route('servidores_vm')
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro Atualizado com sucesso.',
            ]);
    }

    // fim atualizar

    public function apagar(ServidorVm $servVm)
    {
        $servVm->delete();

        return redirect()
            ->back()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Registro apagado com sucesso',
            ]);
    }
}
