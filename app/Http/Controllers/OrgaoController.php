<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orgao;

class OrgaoController extends Controller
{
    public function listar(){

    	$orgaos = Orgao::orderBy('no_orgao')->get();
    	return $orgaos;

    }

    public function listarJson(){

    	$orgaosJson = Orgao::orderBy('no_orgao')->get();
    	echo json_encode($orgaosJson, JSON_UNESCAPED_UNICODE);

    }
}
