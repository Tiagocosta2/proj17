<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Auth;

class ProdutosController extends Controller
{
    //
    public function index() {
			if(Auth::check()){
				$produtos = Produto::all();

			return view('produtos.index', [
				'produtos'=>$produtos
			]);
		}
    	else{
			return redirect()->route('home');
		}
		
    }
    public function show(Request $request) {
		if(Auth::Check()){
			$idProduto= $request->id; 
    	$produto = Produto::where('id_produto', $idProduto)->with('encomendas')->first();
    	return view('produtos.show', [
    		'produto'=>$produto
    	]);
		}
    	else{
			return redirect()->route('home');
		}
	}
	
	public function create() {
		if(Auth::Check()){
			return view('produtos.create');
		}
		else{
			return redirect()->route('home');
		}
	}

	public function store(Request $request){
		if(Auth::Check()){
			$novoProduto=$request->validate([
			'designacao'=>['required','min:3','max:50'],
			'preco'=>['nullable','numeric'],
			'stock'=>['required','numeric'],
			'observacoes'=>['nullable','min:3','max:250'],
		]);

		$produto = Produto::create($novoProduto);

		return redirect()->route('produtos.index', [
			'id'=>$produto->id_produto
		]);
		}
		else{
			return redirect()->route('home');
		}
		
	}
	public function edit(Request $request){
		if(Auth::Check()){
			$idProduto=$request->id;
		$produto=Produto::where('id_produto', $idProduto)->first();

		return view('produtos.edit', [
			'produto'=>$produto
		]);
		}
		else{
			return redirect()->route('home');
		}
		
	}
	public function update(Request $request){
		if(Auth::Check()){
			$idProduto=$request->id;
		$produto=Produto::findOrFail($idProduto);

		$atualizarProduto=$request->validate([
			'designacao'=>['required','min:3','max:50'],
			'preco'=>['nullable','numeric'],
			'stock'=>['required','numeric'],
			'observacoes'=>['nullable','min:3','max:250'],
		]);

		$produto->update($atualizarProduto);

		return redirect()->route('produtos.show',[
			'id'=>$produto->id_produto
		]);
		}
		else{
			return redirect()->route('home');
		}
		
	}
	public function delete(Request $request){
		if(Auth::Check()){
			$idProduto=$request->id;
        $produto=Produto::where('id_produto',$idProduto)->first();

        return view('produtos.delete',[
            'produto'=>$produto
        ]); 
		}
		else{
			return redirect()->route('home');
		}
        
    }
    public function destroy(Request $request){
		if(Auth::Check()){
			 $idProduto=$request->id;
        $produto=Produto::findOrFail($idProduto);
        $produto->delete();

        return redirect()->route('produtos.index');
		}
		else{
			return redirect()->route('home');
		}
       
    }
}
