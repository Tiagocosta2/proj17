<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    //
    public function index() {
    	$clientes = Cliente::all();

    	return view('clientes.index', [
    		'clientes'=>$clientes
    	]);
    }
    public function show(Request $request) {
    	$idCliente= $request->id;
    	$cliente = Cliente::where('id_cliente', $idCliente)->with('encomendas')->first();
    	return view('clientes.show', [
    		'cliente'=>$cliente
    	]);
	}
	
	public function create() {
		return view('clientes.create');
	}

	public function store(Request $request){
		$novoCliente=$request->validate([
			'nome'=>['required','min:3','max:50'],
			'morada'=>['nullable','min:3','max:250'],
			'telefone'=>['required','min:8','max:13'],
			'email'=>['nullable','min:3','max:250'],
		]);

		$cliente = Cliente::create($novoCliente);

		return redirect()->route('clientes.index', [
			'id'=>$cliente->id_cliente
		]);
	}
	public function edit(Request $request){
		$idCliente=$request->id;
		$cliente=Cliente::where('id_cliente', $idCliente)->first();

		return view('clientes.edit', [
			'cliente'=>$cliente
		]);
	}
	public function update(Request $request){
		$idCliente=$request->id;
		$cliente=Cliente::findOrFail($idCliente);

		$atualizarCliente=$request->validate([
			'nome'=>['required','min:3','max:50'],
			'morada'=>['nullable','min:3','max:250'],
			'telefone'=>['required','min:8','max:13'],
			'email'=>['nullable','min:3','max:250'],
		]);

		$cliente->update($atualizarCliente);

		return redirect()->route('clientes.show',[
			'id'=>$cliente->id_cliente
		]);
	}
	public function delete(Request $request){
		$idCliente=$request->id;
		$cliente=Cliente::where('id_cliente',$idCliente)->first();

		return view('clientes.delete',[
			'cliente'=>$cliente
		]); 
	}
	public function destroy(Request $request){
		$idCliente=$request->id;
		$cliente=Cliente::findOrFail($idCliente);
		$cliente->delete();

		return redirect()->route('clientes.index');
	}
}
