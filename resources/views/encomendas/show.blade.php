@extends('layout')
@section('conteudo')
<div class="w-100 p-3" style="background-color: #eee;">
<table class="table table-dark" >
	<thead>
		<tr>
		@if(isset($encomenda->id_encomenda))
		<th scope="col"><h1>Detalhes das Encomendas {{$encomenda->id_encomenda}}</h1></th>
		</tr>
	</thead>
<tbody>	
	<tr>
		<th scope="row">Data</th>
      	<td>{{$encomenda->data}}</td>
	</tr>
	<tr>
		<th scope="row">Observações</th>
      	<td>{{$encomenda->observacoes}}</td>
	</tr>
	<tr>
		<th scope="row">Cliente</th>
      	<td>{{$encomenda->clientes->nome}}</td>
	</tr>
	@if(isset($encomenda->vendedores))
	<tr>
		<th scope="row">Vendedor</th>
      	<td>{{$encomenda->vendedores->nome}}</td>
	</tr>
	@endif

@else
<h1 style="color:#ff0000">Erro</h1>
@endif
	<tr>
		<th scope="row">Produto</th>
		@foreach($encomenda->produtos as $produto)
      	<td><a href="{{route('produtos.show', ['id'=>$produto->id_produto])}}">{{$produto->designacao}}</td>
      	@endforeach
	</tr>
</tbody>
</table>
</div>
@if(Auth::user())
<button type="button" class="btn btn-outline-primary"><a href="{{route('encomendas.edit', ['id'=>$encomenda->id_encomenda])}}">Editar</button><br>
<button type="button" class="btn btn-outline-primary"><a href="{{route('encomendas.delete', ['id'=>$encomenda->id_encomenda])}}">Eliminar</button><br>		
@endif
@endsection