<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutosController extends Controller
{
    //
    public function index() {
    	$produtos = Produto::all();

    	return view('produtos.index', [
    		'produtos'=>$produtos
    	]);
    }
    public function show(Request $request) {
    	$idProduto= $request->id; 
    	$produto = Produto::where('id_produto', $idProduto)->with('encomendas')->first();
    	return view('produtos.show', [
    		'produto'=>$produto
    	]);
	}
	
	public function create() {
		return view('produtos.create');
	}

	public function store(Request $request){
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
}
