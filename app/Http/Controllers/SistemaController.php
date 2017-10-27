<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Orgao;
use App\Banco;
use App\Ambiente;
use App\Desenvolvedor;
use App\Framework;
use App\Sistema;
use App\Responsavel;

class SistemaController extends Controller
{
    public function listar()
    {
        return view('sistema/sistemas', [
            'listaOrgaos' => Orgao::orderBy('no_orgao')->get(),
            'listaBancos' => Banco::orderBy('schema_banco')->get(),
            'listaAmbientes' => Ambiente::orderBy('desc_amb')->get(),
            'listaDevs' => Desenvolvedor::orderBy('no_dev')->get(),
            'listaFrames' => Framework::orderBy('no_framework')->get(),
            'listaSistemas' => Sistema::all(),
        ]);
    }

    function bancoDuplicado($arr){
        $rs = count($arr) !== count(array_unique($arr));
        return $rs;
    }

    public function inserir(Request $request)
    {
        $dados = $request->all();

        $count = Sistema::where('no_sistema', $request->no_sistema)->count();

        if ($count > 0) {
            return redirect()->back()->
            with('retorno', ['tipo' => 'warning', 'msg' => 'Já existe Sistema de mesmo Nome!'])->
            withInput();
        }
        else if($this->bancoDuplicado($request->id_banco)){

            return redirect()
            ->back()
            ->with('retorno', ['tipo'=>'warning', 'msg'=>'Selecione bancos diferentes.'])
            ->withInput();
        }
        else {
            $sistema = new Sistema($dados);
            if ($sistema->save()) {
                $sistema->desenvolvedores()->sync($request->devs);
                $sistema->frameworks()->sync($request->frames);
                $sistema->bancos()->sync($request->id_banco);

                return redirect()
                    ->back()
                    ->with('retorno', [
                        'tipo' => 'success',
                        'msg' => 'Cadastro inserido com sucesso!',
                    ]);
            } else {
                return redirect()
                    ->back()
                    ->with('retorno', [
                        'tipo' => 'danger',
                        'msg' => 'Não foi possível inserir cadastro!',
                    ])->withInput();
            }
        }
    }

    public function detalhar(Sistema $sistema)
    {
        

        return view('sistema/sistema', [
            'sistema' => $sistema,
        ]);
    }

    public function altera(Sistema $sistema)
    {
        return view('sistema/altera_sistema', [
            'sistema' => $sistema,
            'listaOrgaos' => Orgao::orderBy('no_orgao')->get(),
            'listaBancos' => Banco::orderBy('schema_banco')->get(),
            'listaAmbientes' => Ambiente::orderBy('desc_amb')->get(),
            'listaDevs' => Desenvolvedor::orderBy('no_dev')->get(),
            'listaFrames' => Framework::orderBy('no_framework')->get(),
        ]);
    }

    public function atualizar(Request $request, Sistema $sistema)
    {
        if($this->bancoDuplicado($request->id_banco)){

            return redirect()
            ->back()
            ->with('retorno', ['tipo'=>'warning', 'msg'=>'Selecione bancos diferentes.'])
            ->withInput();

        }else{

            $dados = $request->all();
            $sistema->update($dados);

            $sistema->desenvolvedores()->sync($request->devs);
            $sistema->frameworks()->sync($request->frames);
            $sistema->bancos()->sync($request->id_banco);

            return redirect()
                ->route('sistemas')
                ->with('retorno', [
                    'tipo' => 'success',
                    'msg' => 'Cadastro Atualizado com sucesso.',
                ]);

        }
    }

    //fim do atualizar

    public function apagar(Sistema $sistema)
    {
        if($sistema->delete()){
            $sistema->desenvolvedores()->detach();
            $sistema->frameworks()->detach();
            $sistema->bancos()->detach();            

            return redirect()
                ->back()
                ->with('retorno', [
                    'tipo' => 'success',
                    'msg' => 'Cadastro apagado com sucesso.',
                ]);

        }else{

            return redirect()
            ->back()
            ->with('retorno', ['tipo' => 'warning', 'msg' => 'Não foi possível apagar o registro']);
        }
        
        
    }
}
