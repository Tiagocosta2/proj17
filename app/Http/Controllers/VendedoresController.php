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
	
	public function create() {
		return view('vendedores.create');
	}

	public function store(Request $request){
		$novoVendedor=$request->validate([
			'nome'=>['required','min:3','max:50'],
			'especialidade'=>['nullable','min:3','max:250'],
			'email'=>['nullable','min:3','max:250'],
		]);

		$vendedor = Vendedor::create($novoVendedor);

		return redirect()->route('vendedores.index', [
			'id'=>$vendedor->id_vendedor
		]);
	}
	public function edit(Request $request){
		$idVendedor=$request->id;
		$vendedor=Vendedor::where('id_vendedor', $idVendedor)->first();

		return view('vendedores.edit', [
			'vendedor'=>$vendedor
		]);
	}
	public function update(Request $request){
		$idVendedor=$request->id;
		$vendedor=Vendedor::findOrFail($idVendedor);

		$atualizarVendedor=$request->validate([
			'nome'=>['required','min:3','max:50'],
			'especialidade'=>['nullable','min:3','max:250'],
			'email'=>['nullable','min:3','max:250'],
		]);

		$vendedor->update($atualizarVendedor);

		return redirect()->route('vendedores.show',[
			'id'=>$vendedor->id_vendedor
		]);
	}
}
