<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Encomenda;
use Auth;

class ClientesController extends Controller
{
    //
    public function index() {
		if(Auth::Check()){
			$clientes = Cliente::all();

    	return view('clientes.index', [
    		'clientes'=>$clientes
    	]);
		}
		else{
			return redirect()->route('home');
		}
    	
    }
    public function show(Request $request) {
		if(Auth::Check()){
			$idCliente= $request->id;
    	$cliente = Cliente::where('id_cliente', $idCliente)->with('encomendas')->first();
    	return view('clientes.show', [
    		'cliente'=>$cliente
    	]);
		}
		else{
			return redirect()->route('home');
		}
    	
	}
	
	public function create() {
		if(Auth::Check()){
			return view('clientes.create');
		}
		else{
			return redirect()->route('home');
		}
	}

	public function store(Request $request){
		if(Auth::Check()){
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
		else{
			return redirect()->route('home');
		}
		
	}
	public function edit(Request $request){
		if(Auth::Check()){
			$idCliente=$request->id;
		$cliente=Cliente::where('id_cliente', $idCliente)->first();

		return view('clientes.edit', [
			'cliente'=>$cliente
		]);
		}
		else{
			return redirect()->route('home');
		}
		
	}
	public function update(Request $request){
		if(Auth::Check()){
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
		else{
			return redirect()->route('home');
		}
		
	}
	public function delete(Request $request){
		if(Auth::Check()){
			$idCliente=$request->id;
		$cliente=Cliente::where('id_cliente',$idCliente)->first();

		return view('clientes.delete',[
			'cliente'=>$cliente
		]); 
		}
		else{
			return redirect()->route('home');
		}
	}
	public function destroy(Request $request){
		if(Auth::Check()){
			$idCliente=$request->id;
		$cliente=Cliente::findOrFail($idCliente);
		$cliente->delete();

		return redirect()->route('clientes.index');
		}
		else{
			return redirect()->route('home');
		}
		
	}
}
