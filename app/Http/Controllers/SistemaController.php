<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Orgao;
use App\Banco;
use App\Unidade;
use App\Ambiente;
use App\Desenvolvedor;
use App\Framework;
use App\Sistema;
use App\Responsavel;

class SistemaController extends Controller
{
    public function listar()
    {
        $listaOrgaos = Orgao::orderBy('no_orgao')->get();
        $listaBancos = Banco::orderBy('schema_banco')->get();
        $listaAmbientes = Ambiente::orderBy('desc_amb')->get();
        $listaDevs = Desenvolvedor::orderBy('no_dev')->get();
        $listaFrames = Framework::orderBy('no_framework')->get();
        $listaSistemas = Sistema::all();

        return view('sistema/sistemas', compact('listaOrgaos', 'listaBancos', 'listaAmbientes', 'listaDevs', 'listaFrames', 'listaSistemas'));
    }

    public function inserir(Request $request)
    {
        $dados = $request->except(['_token', 'devs', 'frames']);

        $count = Sistema::where('no_sistema', $request->no_sistema)->count();

        if ($count > 0) {
            \Session::flash('retorno', ['tipo' => 'warning', 'msg' => 'Já existe Sistema de mesmo Nome!']);

            return redirect()->back();
        } else {
            $insert = Sistema::insert($dados);

            if ($insert) {
                $sis = Sistema::where('no_sistema', $request->no_sistema)->where('id_orgao', $request->id_orgao)->where('id_unidade', $request->id_unidade)->get();

                foreach ($request->devs as $devs) {
                    DB::table('sistemas_devs')->insert(
                        ['id_sistema' => $sis[0]->id, 'id_dev' => $devs]
                    );
                }

                if ($request->frames) {
                    foreach ($request->frames as $frames) {
                        DB::table('sistemas_frameworks')->insert(
                            ['id_sistema' => $sis[0]->id, 'id_framework' => $frames]
                        );
                    }
                }

                \Session::flash('retorno', ['tipo' => 'success', 'msg' => 'Cadastro inserido com sucesso!']);

                return redirect()->back();
            } else {
                \Session::flash('retorno', ['tipo' => 'danger', 'msg' => 'Não foi possível inserir cadastro!']);

                return redirect()->back();
            }
        }
    }

    // fim inserir

    public function detalhar($id)
    {
        $sistema = Sistema::where('id', $id)->get();
        $orgao = Orgao::where('id', $sistema[0]->id_orgao)->get();
        $unidade = Unidade::where('id', $sistema[0]->id_unidade)->get();
        $responsaveis = Responsavel::where('orgao_id', $orgao[0]->id)->where('unidade_id', $unidade[0]->id)->get();
        $banco = Banco::where('id_banco', $sistema[0]->id_banco)->get();
        $ambientes = Ambiente::where('id', $sistema[0]->id_amb)->get();

        $devs = DB::table('dev')->join('sistemas_devs', 'dev.id', '=', 'sistemas_devs.id_dev')->
        where('sistemas_devs.id_sistema', $sistema[0]->id)->get();

        $frames = DB::table('frameworks')->join('sistemas_frameworks', 'frameworks.id', '=', 'sistemas_frameworks.id_framework')->
        where('sistemas_frameworks.id_sistema', $sistema[0]->id)->get();

        return view('sistema/sistema',
         compact('sistema', 'orgao', 'unidade', 'responsaveis', 'banco', 'ambientes', 'devs', 'frames'));
    }

    // fim detalhar

    public function altera($id)
    {
        $sistema = Sistema::where('id', $id)->get();
        $orgaos = Orgao::orderBy('no_orgao')->get();
        $unidade = Unidade::where('id', $sistema[0]->id_unidade)->get();
        $bancos = Banco::orderBy('schema_banco')->get();
        $ambientes = Ambiente::orderBy('desc_amb')->get();
        $devs = Desenvolvedor::orderBy('no_dev')->get();
        $frames = Framework::orderBy('no_framework')->get();
        $slcDevs = DB::table('sistemas_devs')->where('sistemas_devs.id_sistema', $sistema[0]->id)->get();
        $slcFrames = DB::table('sistemas_frameworks')->where('sistemas_frameworks.id_sistema', $sistema[0]->id)->get();

        return view('sistema/altera_sistema', compact('sistema', 'orgaos', 'unidade', 'bancos', 'ambientes', 'devs', 'frames', 'slcDevs', 'slcFrames'));
    }

    // fim altera

    public function atualizar(Request $request, $id)
    {
        $dados = $request->except(['_token', 'devs', 'frames']);
        $updateSis = Sistema::where('id', $id)->update($dados);

        $updateDev = DB::table('sistemas_devs')->where('id_sistema', $id)->delete();
        foreach ($request->devs as $devs) {
            DB::table('sistemas_devs')->insert(
                ['id_sistema' => $id, 'id_dev' => $devs]
            );
        }

        if ($request->frames) {
            DB::table('sistemas_frameworks')->where('id_sistema', $id)->delete();
            foreach ($request->frames as $frames) {
                DB::table('sistemas_frameworks')->insert(
                    ['id_sistema' => $id, 'id_framework' => $frames]
                );
            }
        } else {
            DB::table('sistemas_frameworks')->where('id_sistema', $id)->delete();
        }

        if ($updateSis || $updateDev) {
            \Session::flash('retorno', ['tipo' => 'success', 'msg' => 'Cadastro alterado com sucesso!']);

            return redirect()->route('sistemas');
        } else {
            \Session::flash('retorno', ['tipo' => 'warning', 'msg' => 'Cadastro não alterado!']);

            return redirect()->route('sistemas');
        }
    }

    public function apagar($id)
    {
        $apaga = Sistema::find($id)->delete();

        if ($apaga) {
            DB::table('sistemas_devs')->where('id_sistema', $id)->delete();
            DB::table('sistemas_frameworks')->where('id_sistema', $id)->delete();
            \Session::flash('retorno', ['tipo' => 'success', 'msg' => 'Registro apagado com sucesso!']);

            return redirect()->back();
        } else {
            \Session::flash('retorno', ['tipo' => 'warning', 'msg' => 'Não foi possível apagar o registro!']);

            return redirect()->back();
        }
    }
}
