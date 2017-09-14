<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orgao;

class SistemaController extends Controller
{
    public function listar(){
    	$listaOrgaos = Orgao::orderBy('no_orgao')->get();	
    	return view('sistema/sistemas', compact('listaOrgaos'));
    }
}
