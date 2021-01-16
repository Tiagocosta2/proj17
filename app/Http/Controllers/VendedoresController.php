<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
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
		if (Gate::allows('admin')) {
			return view('vendedores.create');
		}
		else{
			return redirect()->route('vendedores.index')->with('mensagem1','Erro não tem permissoes para entrar nesta area');
		}
	}

	public function store(Request $request){
		if (Gate::allows('admin')) {
			$novoVendedor=$request->validate([
			'nome'=>['required','min:3','max:50'],
			'especialidade'=>['nullable','min:3','max:250'],
			'email'=>['nullable','min:3','max:250'],
			'imagem'=>['image','nullable','max:2000'],
		]);
			if($request->hasFile('imagem')){
            $nomeImagem=$request->file('imagem')->getClientOriginalName();

            $nomeImagem=time().'_'.$nomeImagem;
            $guardarImagem=$request->file('imagem')->storeAs('imagens/vendedores',$nomeImagem);

            $novoVendedor['imagem']=$nomeImagem;
        }	

		$vendedor = Vendedor::create($novoVendedor);

		return redirect()->route('vendedores.index', [
			'id'=>$vendedor->id_vendedor
		]);
		}
		else{
			return redirect()->route('vendedores.index')->with('mensagem1','Erro não tem permissoes para entrar nesta area');
		}
		
	}
	public function edit(Request $request){
		$idVendedor=$request->id;
		$vendedor=Vendedor::where('id_vendedor', $idVendedor)->first();
		if(Gate::allows('admin')){
		return view('vendedores.edit', [
			'vendedor'=>$vendedor
		]);
		}
		else{
			return redirect()->route('vendedores.index')->with('mensagem1','Erro não tem permissoes para entrar nesta area');
		}
		
	}
	public function update(Request $request){
		if(Gate::allows('admin')){
			$idVendedor=$request->id;
		$vendedor=Vendedor::findOrFail($idVendedor);
		$imagemAntiga=$vendedor->imagem;
		$atualizarVendedor=$request->validate([
			'nome'=>['required','min:3','max:50'],
			'especialidade'=>['nullable','min:3','max:250'],
			'email'=>['nullable','min:3','max:250'],
			'imagem'=>['image','nullable','max:2000'],
		]);
		if($request->hasFile('imagem')){
            $nomeImagem=$request->file('imagem')->getClientOriginalName();

            $nomeImagem=time().'_'.$nomeImagem;
            $guardarImagem=$request->file('imagem')->storeAs('imagens/vendedores',$nomeImagem);

                if(!is_null($imagemAntiga)){
                    Storage::Delete('imagens/vendedores/'.$imagemAntiga);
                }
            $atualizarVendedor['imagem']=$nomeImagem;
        } 

		$vendedor->update($atualizarVendedor);

		return redirect()->route('vendedores.show',[
			'id'=>$vendedor->id_vendedor
		]);
		}
		else{
			return redirect()->route('vendedores.index')->with('mensagem1','Erro não tem permissoes para entrar nesta area');		}
		
	}
	public function delete(Request $request){
		if(Gate::allows('admin')){
			$idVendedor=$request->id;
        $vendedor=Vendedor::where('id_vendedor',$idVendedor)->first();

        return view('vendedores.delete',[
            'vendedor'=>$vendedor
        ]); 
		}
		else{
			return redirect()->route('vendedores.index')->with('mensagem1','Erro não tem permissoes para entrar nesta area');
		}
        
    }
    public function destroy(Request $request){
		if(Gate::allows('admin')){
			$idVendedor=$request->id;
        $vendedor=Vendedor::findOrFail($idVendedor);
        $vendedor->delete();

        return redirect()->route('vendedores.index');
		}
		else{
			return redirect()->route('vendedores.index')->with('mensagem1','Erro não tem permissoes para entrar nesta area');
		}
        
    }
}
