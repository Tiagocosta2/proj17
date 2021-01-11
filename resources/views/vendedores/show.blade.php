@extends('layout')
@section('conteudo')
<div class="w-100 p-3" style="background-color: #eee;">
	<table class="table table-dark">
		<thead>
			<tr>
			@if(isset($vendedor->id_vendedor))
			<th scope="col"><h1> Detalhes do Vendedor {{$vendedor->id_vendedor}}</h1></th>	
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row">Nome</th>
      			<td>{{$vendedor->nome}}</td>
			</tr>
			<tr>
				<th scope="row">Nacionalidade</th>
      			<td>{{$vendedor->especialidade}}</td>
			</tr>
			<tr>
				<th scope="row">Email</th>
      			<td>{{$vendedor->email}}</td>
			</tr>
@else
<h1 style="color:#ff0000">Erro</h1>
@endif
<tr>
	<th scope="row">Data de Encomenda</th>
	@foreach($vendedor->encomendas as $encomenda)
	<td>{{$encomenda->data}}</td>
	@endforeach
</tr>
		</tbody>
</table>
</div>
@endsection