@extends('layout')
@section('conteudo')
<div class="w-100 p-3" style="background-color: #eee;">
<table class="table table-dark" >
	<thead>
		<tr>
			@if(isset($cliente->id_cliente))
			<th scope="col" ><h1> Detalhes do Cliente {{$cliente->id_cliente}}</h1></th>
		</tr>
</thead>
<tbody>
	<tr>
		<th scope="row">Nome</th>
      	<td>{{$cliente->nome}}</td>
	</tr>
	<tr>
		<th scope="row">Morada</th>
      	<td>{{$cliente->morada}}</td>
	</tr>
	<tr>
		<th scope="row">Telefone</th>
      	<td>{{$cliente->telefone}}</td>
	</tr>
	<tr>
		<th scope="row">Email</th>
      	<td>{{$cliente->email}}</td>
	</tr>


@else
<h1 style="color:#ff0000">Erro</h1>

@endif

<tr>
	<th scope="row">Encomenda</th>
	@foreach($cliente->encomendas as $encomenda)
      <td>{{$encomenda->data}}</td>
	@endforeach
</tr>
</tbody>
</table>
</div>
@endsection 