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
        return view('sistema/sistemas', [
            'listaOrgaos' => Orgao::orderBy('no_orgao')->get(),
            'listaBancos' => Banco::orderBy('schema_banco')->get(),
            'listaAmbientes' => Ambiente::orderBy('desc_amb')->get(),
            'listaDevs' => Desenvolvedor::orderBy('no_dev')->get(),
            'listaFrames' => Framework::orderBy('no_framework')->get(),
            'listaSistemas' => Sistema::all(),
        ]);
    }

    public function inserir(Request $request)
    {
        $dados = $request->except(['_token', 'devs', 'frames']);

        $count = Sistema::where('no_sistema', $request->no_sistema)->count();

        if ($count > 0) {
            return redirect()->back()->
            with('retorno', ['tipo' => 'warning', 'msg' => 'Já existe Sistema de mesmo Nome!'])->
            withInput();
        } else {
            $sistema = new Sistema();
            $insert = $sistema->fill($dados)->save();
            if ($insert) {
                // $sis = Sistema::where('no_sistema', $request->no_sistema)->where('id_orgao', $request->id_orgao)->where('id_unidade', $request->id_unidade)->get();

                foreach ($request->devs as $devs) {
                    DB::table('sistemas_devs')->insert(
                        ['id_sistema' => $sistema->id, 'id_dev' => $devs]
                    );
                }

                if ($request->frames) {
                    foreach ($request->frames as $frames) {
                        DB::table('sistemas_frameworks')->insert(
                            ['id_sistema' => $sistema->id, 'id_framework' => $frames]
                        );
                    }
                }

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

    // fim inserir

    public function detalhar($id)
    {
        $sistema = Sistema::findOrFail($id);
        $responsaveis = Responsavel::where('orgao_id', $orgao->id)->where('unidade_id', $unidade->id)->get();

        $devs = DB::table('dev')->join('sistemas_devs', 'dev.id', '=', 'sistemas_devs.id_dev')->
        where('sistemas_devs.id_sistema', $sistema->id)->get();

        $frames = DB::table('frameworks')->join('sistemas_frameworks', 'frameworks.id', '=', 'sistemas_frameworks.id_framework')->
        where('sistemas_frameworks.id_sistema', $sistema->id)->get();

        return view('sistema/sistema', [
            'sistema' => $sistema,
            'orgao' => Orgao::findOrFail($sistema->id_orgao),
            'unidade' => Unidade::findOrFail($sistema->id_unidade),
            'responsaveis' => $responsaveis,
            'banco' => Banco::findOrFail($sistema->id_banco),
            'ambientes' => Ambiente::findOrFail($sistema->id_amb),
            'devs' => $devs,
            'frames' => $frames,
        ]);
    }

    // fim detalhar

    public function altera($id)
    {
        $sistema = Sistema::findOrFail($id);
        $slcDevs = DB::table('sistemas_devs')->where('sistemas_devs.id_sistema', $sistema->id)->get();
        $slcFrames = DB::table('sistemas_frameworks')->where('sistemas_frameworks.id_sistema', $sistema->id)->get();

        return view('sistema/altera_sistema', [
            'sistema' => $sistema,
            'orgaos' => Orgao::orderBy('no_orgao')->get(),
            'unidade' => Unidade::findOrFail($sistema->id_unidade),
            'bancos' => Banco::orderBy('schema_banco')->get(),
            'ambientes' => Ambiente::orderBy('desc_amb')->get(),
            'devs' => Desenvolvedor::orderBy('no_dev')->get(),
            'frames' => Framework::orderBy('no_framework')->get(),
            'slcDevs' => $slcDevs,
            'slcFrames' => $slcFrames,
        ]);
    }

    // fim altera

    public function atualizar(Request $request, $id)
    {
        $dados = $request->except(['_token', 'devs', 'frames']);
        $sistema = new Sistema();
        $sistema->findOrFail($id)->update($dados);

        DB::table('sistemas_devs')->where('id_sistema', $id)->delete();
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

        return redirect()
            ->route('sistemas')
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Cadastro Atualizado com sucesso.',
            ]);
    }

    //fim atualiza cadastro

    public function apagar($id)
    {
        Sistema::findOrFail($id)->delete();

        return redirect()
            ->back()
            ->with('retorno', [
                'tipo' => 'success',
                'msg' => 'Cadastro apagado com sucesso.',
            ]);
    }
}
