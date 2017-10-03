<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ServidorVm;

class ServidorVmController extends Controller
{
    public function listar()
    {
    	$servs_vm = ServidorVm::all();

    	return view('serv_vm/servidores_vm', compact('servs_vm'));
    }
}
