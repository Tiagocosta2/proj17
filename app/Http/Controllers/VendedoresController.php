<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;
use Auth;

class VendedoresController extends Controller
{
    //
    public function index() {
		if(Auth::Check()){
			$vendedores = Vendedor::all();

    	return view('vendedores.index', [
    		'vendedores'=>$vendedores
    	]);
		}
		else{
			return redirect()->route('home');
		}
    	
    }
    public function show(Request $request) {
		if(Auth::Check()){
			$idVendedor= $request->id;
    	$vendedor = Vendedor::where('id_vendedor', $idVendedor)->with('encomendas')->first();
    	return view('vendedores.show', [
    		'vendedor'=>$vendedor
    	]);
		}
		else{
			return redirect()->route('home');
		}
    	
	}
	
	public function create() {
		if(Auth::Check()){
			return view('vendedores.create');
		}
		else{
			return redirect()->route('home');
		}
	}

	public function store(Request $request){
		if(Auth::Check()){
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
		else{
			return redirect()->route('home');
		}
		
	}
	public function edit(Request $request){
		if(Auth::Check()){
			$idVendedor=$request->id;
		$vendedor=Vendedor::where('id_vendedor', $idVendedor)->first();

		return view('vendedores.edit', [
			'vendedor'=>$vendedor
		]);
		}
		else{
			return redirect()->route('home');
		}
		
	}
	public function update(Request $request){
		if(Auth::Check()){
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
		else{
			return redirect()->route('home');
		}
		
	}
	public function delete(Request $request){
		if(Auth::Check()){
			$idVendedor=$request->id;
        $vendedor=Vendedor::where('id_vendedor',$idVendedor)->first();

        return view('vendedores.delete',[
            'vendedor'=>$vendedor
        ]); 
		}
		else{
			return redirect()->route('home');
		}
        
    }
    public function destroy(Request $request){
		if(Auth::Check()){
			$idVendedor=$request->id;
        $vendedor=Vendedor::findOrFail($idVendedor);
        $vendedor->delete();

        return redirect()->route('vendedores.index');
		}
		else{
			return redirect()->route('home');
		}
        
    }
}
