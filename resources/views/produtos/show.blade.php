@extends('layout')
@section('conteudo')
<div class="w-100 p-3" style="background-color: #eee;">
<table class="table table-dark">
	<thead>
		<tr>
		@if(isset($produto->id_produto))
		<th scope="col"><h1> Detalhes do Produto {{$produto->id_produto}}</h1></th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<th scope="row">Designação</th>
      	<td>{{$produto->designacao}}</td>
		</tr>
		<tr>
		<th scope="row">Stock</th>
      	<td>{{$produto->stock}}</td>
		</tr>
		<tr>
		<th scope="row">Preço</th>
      	<td>{{$produto->preco}}€</td>
	</tr>

@else
<h1 style="color:#ff0000">Erro</h1>
@endif
<tr>

	<th scope="row">Encomenda</th>
	@foreach($produto->encomendas as $encomenda)
    <td><a href="{{route('encomendas.show', ['id'=>$encomenda->id_encomenda])}}">{{$encomenda->data}}</a></td>
@endforeach
</tr>
	</tbody>
</table>
</div>
@endsection