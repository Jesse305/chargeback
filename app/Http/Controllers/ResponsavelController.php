<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Responsavel;
use App\Orgao;
use App\Unidade;

class ResponsavelController extends Controller
{
    public function listar(){
    	$responsaveis = Responsavel::orderBy('no_responsavel')->get();
    	$orgaos = Orgao::orderBy('no_orgao')->get();    	
    	return view('responsavel/responsaveis', compact('responsaveis', 'orgaos'));
    }

    public function inserir(Request $request){
    	$dados = $request->except('_token');
    	
    }
}
