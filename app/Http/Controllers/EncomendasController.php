<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encomenda;
use App\Models\Cliente;
use App\Models\Vendedor;
use App\Models\Produto;
use App\Models\EncomendaProduto;
use Auth;

class EncomendasController extends Controller
{
    //
    public function index() {
        if(Auth::Check()){
            $encomendas = Encomenda::all();

    	return view('encomendas.index', [
    		'encomendas'=>$encomendas
    	]);
        }
        else{
            return redirect()->route('home');
        }
    	
    }
    public function show(Request $request) {
        if(Auth::Check()){
            $idEncomenda= $request->id;
        $encomenda = Encomenda::where('id_encomenda', $idEncomenda)->with(['clientes','vendedores','produtos'])->first();
        
    	return view('encomendas.show', [
    		'encomenda'=>$encomenda
    	]);
        }
        else{
            return redirect()->route('home');
        }
    	
    }
    public function mostrar (Request $request){
        $caixa = $request->caixa;
        $encomenda= Cliente::where('nome','like','%'.$caixa.'%')->get();
        return view('encomendas.mostrar', [
            'encomenda'=>$encomenda
        ]);
    }

    public function create() {
        if(Auth::Check()){
             $clientes=Cliente::all();
        $vendedores=Vendedor::all();
        $produtos=Produto::all();
		return view('encomendas.create', [
            'clientes'=>$clientes,
            'vendedores'=>$vendedores,
            'produtos'=>$produtos
        ]);
        }
        else{
            return redirect()->route('home');
        }
       
	}

	public function store(Request $request){
        if(Auth::Check()){
           $novoEncomenda=$request->validate([
			'id_cliente'=>['numeric','required'],
			'id_vendedor'=>['nullable','required'],
			'data'=>['required','date'],
			'observacoes'=>['nullable','min:3','max:250'],
		]);
        $produto=$request->id_produto;
        $encomenda = Encomenda::create($novoEncomenda);
        $encomenda->produtos()->attach($produto);
		return redirect()->route('encomendas.index', [
            'id'=>$encomenda->id_encomenda
		]); 
        }
        else{
            return redirect()->route('home');
        }
		
	}
    public function edit(Request $request){
        if(Auth::Check()){
             $idEncomenda=$request->id;
        $clientes=Cliente::all();
        $vendedores=Vendedor::all();
        $produtos=Produto::all();
        $encomenda=Encomenda::where('id_encomenda', $idEncomenda)->first();

        return view('encomendas.edit', [
            'encomenda'=>$encomenda,
            'clientes'=>$clientes,
            'vendedores'=>$vendedores,
            'produtos'=>$produtos
        ]);
        }
        else{
            return redirect()->route('home');
        }
       
    }
    public function update(Request $request){
        if(Auth::Check()){
            $idEncomenda=$request->id;
        $encomenda=Encomenda::findOrFail($idEncomenda);

        $atualizarEncomenda=$request->validate([
            'id_cliente'=>['numeric','required'],
            'id_vendedor'=>['nullable','required'],
            'data'=>['required','date'],
            'observacoes'=>['nullable','min:3','max:250'],
        ]);

        $encomenda->update($atualizarEncomenda);

        return redirect()->route('encomendas.show',[
            'id'=>$encomenda->id_encomenda
        ]);
        }
        else{
            return redirect()->route('home');
        }
        
    }
    public function delete(Request $request){
        if(Auth::Check()){
            $idEncomenda=$request->id;
        $encomenda=Encomenda::where('id_encomenda',$idEncomenda)->first();

        return view('encomendas.delete',[
            'encomenda'=>$encomenda
        ]); 
        }
        else{
            return redirect()->route('home');
        }
        
    }
    public function destroy(Request $request){
        if(Auth::Check()){
            $idEncomenda=$request->id;
        $encomenda=Encomenda::findOrFail($idEncomenda);
        $encomenda->delete();

        return redirect()->route('encomendas.index');
        }
        else{
            return redirect()->route('home');
        }
        
    }
}