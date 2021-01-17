<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
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
		if(Gate::allows('admin')){
			return view('clientes.create');
		}
		else{
			return redirect()->route('clientes.index')->with('mensagem1','Erro não tem permissoes para entrar nesta area');
		}
	}

	public function store(Request $request){
		if(Gate::allows('admin')){
			$novoCliente=$request->validate([
			'nome'=>['required','min:3','max:50'],
			'morada'=>['nullable','min:3','max:250'],
			'telefone'=>['required','min:8','max:13'],
			'email'=>['nullable','min:3','max:250'],
			'imagem'=>['image','nullable','max:2000'],
		]);
		if($request->hasFile('imagem')){
            $nomeImagem=$request->file('imagem')->getClientOriginalName();

            $nomeImagem=time().'_'.$nomeImagem;
            $guardarImagem=$request->file('imagem')->storeAs('imagens/clientes',$nomeImagem);

            $novoCliente['imagem']=$nomeImagem;
        }	

		$cliente = Cliente::create($novoCliente);

		return redirect()->route('clientes.index', [
			'id'=>$cliente->id_cliente
		])->with('mensagem2','Cliente criado');
		}
		else{
			return redirect()->route('clientes.index')->with('mensagem1','Erro não tem permissoes para entrar nesta area');
		}
		
	}
	public function edit(Request $request){
		$idCliente=$request->id;
		$cliente=Cliente::where('id_cliente', $idCliente)->first();
		if(Gate::allows('admin')){
		return view('clientes.edit', [
			'cliente'=>$cliente
		]);
		}
		else{
			return redirect()->route('clientes.index')->with('mensagem1','Erro não tem permissoes para entrar nesta area');
		}
		
	}
	public function update(Request $request){
		if(Gate::allows('admin')){
			$idCliente=$request->id;
		$cliente=Cliente::findOrFail($idCliente);
		$imagemAntiga=$cliente->imagem;
		$atualizarCliente=$request->validate([
			'nome'=>['required','min:3','max:50'],
			'morada'=>['nullable','min:3','max:250'],
			'telefone'=>['required','min:8','max:13'],
			'email'=>['nullable','min:3','max:250'],
			'imagem'=>['image','nullable','max:2000'],
		]);
		if($request->hasFile('imagem')){
            $nomeImagem=$request->file('imagem')->getClientOriginalName();

            $nomeImagem=time().'_'.$nomeImagem;
            $guardarImagem=$request->file('imagem')->storeAs('imagens/clientes',$nomeImagem);

                if(!is_null($imagemAntiga)){
                    Storage::Delete('imagens/clientes/'.$imagemAntiga);
                }
            $atualizarCliente['imagem']=$nomeImagem;
        } 

		$cliente->update($atualizarCliente);

		return redirect()->route('clientes.show',[
			'id'=>$cliente->id_cliente
		])->with('mensagem2','Cliente editado');
		}
		else{
			return redirect()->route('clientes.index')->with('mensagem1','Erro não tem permissoes para entrar nesta area');
		}
		
	}
	public function delete(Request $request){
		if(Gate::allows('admin')){
			$idCliente=$request->id;
		$cliente=Cliente::where('id_cliente',$idCliente)->first();

		return view('clientes.delete',[
			'cliente'=>$cliente
		]); 
		}
		else{
			return redirect()->route('clientes.index')->with('mensagem1','Erro não tem permissoes para entrar nesta area');
		}
	}
	public function destroy(Request $request){
		if(Gate::allows('admin')){
			$idCliente=$request->id;
		$cliente=Cliente::findOrFail($idCliente);
		$cliente->delete();

		return redirect()->route('clientes.index')->with('mensagem2','Cliente Eliminado');
		}
		else{
			return redirect()->route('clientes.index')->with('mensagem1','Erro não tem permissoes para entrar nesta area');
		}
		
	}


}
