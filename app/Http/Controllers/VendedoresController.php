<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;

class VendedoresController extends Controller
{
    //
    public function index() {
    	$vendedores = Vendedor::all();

    	return view('vendedores.index', [
    		'vendedores'=>$vendedores
    	]);
    }
    public function show(Request $request) {
    	$idVendedor= $request->id;
    	$vendedor = Vendedor::where('id_vendedor', $idVendedor)->with('encomendas')->first();
    	return view('vendedores.show', [
    		'vendedor'=>$vendedor
    	]);
    }
}
