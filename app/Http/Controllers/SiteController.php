<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orgao;

class SiteController extends Controller
{
    public function listar(){
    	$listaOrgaos = Orgao::orderBy('no_orgao')->get();
    	return view('site/sites', compact('listaOrgaos'));
    }
}
