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

    public function inserir(Request $request){

        $dados = $request->except(['_token', '_insert']);

        Banco::insert($dados);        

        return redirect()->route('bancos')->withInput();

    }

    public function detalhar(){

        return view('banco/banco');
    }

    public function alterar($id){

    }

    public function apagar($id){
    	Banco::find($id)->delete();
    	return redirect()->route('bancos');    	
    }
}
