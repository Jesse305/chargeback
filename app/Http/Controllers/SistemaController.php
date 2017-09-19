<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Orgao;
use App\Banco;
use App\Ambiente;
use App\Desenvolvedor;
use App\Framework;
use App\Sistema;

class SistemaController extends Controller
{
    public function listar(){
    	$listaOrgaos = Orgao::orderBy('no_orgao')->get();
    	$listaBancos = Banco::orderBy('schema_banco')->get();	
    	$listaAmbientes = Ambiente::orderBy('desc_amb')->get();
    	$listaDevs = Desenvolvedor::orderBy('no_dev')->get();
    	$listaFrames = Framework::orderBy('no_framework')->get();
        $listaSistemas = Sistema::all();
    	return view('sistema/sistemas', compact('listaOrgaos', 'listaBancos', 'listaAmbientes', 'listaDevs', 'listaFrames', 'listaSistemas'));
    }

    public function inserir(Request $request){
        $dados = $request->except(['_token', 'devs', 'frames']);
        
        $count = Sistema::where('no_sistema', $request->no_sistema)->count();

        if($count > 0){
            \Session::flash('retorno',['tipo'=>'warning', 'msg'=>'Já existe Sistema de mesmo Nome!']);
            return redirect()->back();
        }else{
            $insert = Sistema::insert($dados);

            if($insert){

                $sis = Sistema::where('no_sistema', $request->no_sistema)->where('id_orgao', $request->id_orgao)->where('id_unidade', $request->id_unidade)->get();

                foreach($request->devs as $devs){
                    DB::table('sistemas_devs')->insert(
                        ['id_sistema' => $sis[0]->id, 'id_dev' => $devs ]
                    );
                }

                foreach($request->frames as $frames){
                    DB::table('sistemas_frameworks')->insert(
                        ['id_sistema' => $sis[0]->id, 'id_framework' => $frames]
                    );
                }

                
                \Session::flash('retorno',['tipo'=>'success', 'msg'=>'Cadastro inserido com sucesso!' ]);
                return redirect()->back();
            }else{

                \Session::flash('retorno',['tipo'=>'danger', 'msg'=>'Não foi possível inserir cadastro!']);
                return redirect()->back();

            }
        }
    }
    // fim inserir

    public function apagar($id){
        $apaga = Sistema::find($id)->delete();

        if($apaga){
            \Session::flash('retorno',['tipo'=>'success', 'msg'=>'Registro apagado com sucesso!']);
            return redirect()->back();

        }else{
            \Session::flash('retorno',['tipo'=>'warning', 'msg'=>'Não foi possível apagar o registro!']);
            return redirect()->back();

        }
    }

}
