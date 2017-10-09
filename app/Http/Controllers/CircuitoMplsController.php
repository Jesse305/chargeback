<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CircuitoMpls;

class CircuitoMplsController extends Controller
{
    public function listar(){
    	$circuitos = CircuitoMpls::all();

    	return view('circuito_mpls/circuitos_mpls', compact("circuitos"));
    }

    public function detalhar($id){
    	$circuito = CircuitoMpls::findOrFail($id);

    	return view('circuito_mpls/circuito_mpls', compact('circuito'));

    }
}
