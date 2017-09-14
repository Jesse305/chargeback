<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;

class BancoController extends Controller
{
    public function listar(){
    	$listaBanco = Banco::all();
    	return view('banco/bancos', compact('listaBanco'));
    }

    public function apagar($id){
    	
    }
}
