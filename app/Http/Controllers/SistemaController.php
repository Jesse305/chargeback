<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orgao;

class SistemaController extends Controller
{
    public function index(){
    	$listaOrgaos = Orgao::orderBy('no_orgao')->get();	
    	return view('sistema/sistema', compact('listaOrgaos'));
    }
}
