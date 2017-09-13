<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidade;

class UnidadeController extends Controller
{
    public function unidadeByIdJson($id_orgao){
    	$unidadeByIdJson = Unidade::where('orgao_id', '=', $id_orgao )->get();
    	echo json_encode($unidadeByIdJson, JSON_UNESCAPED_UNICODE);
    }
}
