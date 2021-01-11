<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalController extends Controller
{
    //
    public function processarForm(Request $request){
    	$nome=$request->nome;
    	return view('encomendas.mostrar',[
    		'nome'=>$nome
    	]);
    }
}
