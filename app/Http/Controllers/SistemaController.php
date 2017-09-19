<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    	return view('sistema/sistemas', compact('listaOrgaos', 'listaBancos', 'listaAmbientes', 'listaDevs', 'listaFrames'));
    }

    public function contaSistemaJson($nome){
        $count = Sistema::where('no_sistema', $nome)->count();
        if($count > 0){
            echo json_encode(
                array(['retorno'=>'true'])
            );
        }else{
            echo json_encode(
                array(['retorno'=>'false'])
            );
        }
    }
}
