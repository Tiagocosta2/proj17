@extends('layout')
@section('conteudo')
<div style="text-align: center;">
<table class="table" >
	<thead>
		<tr>
			<th scope="col" style="text-align: center;">Nome</th>
		</tr>
	</thead>
</div>
<tbody>
<tr>
@foreach($vendedores as $vendedor)
<th scope="row"><a href="{{route('vendedores.show', ['id'=>$vendedor->id_vendedor])}}">{{$vendedor->nome}}</a></th>
<br>
@endforeach
</tr>
</tbody>
</table>
<button type="button" class="btn btn-outline-primary"><a href="{{route('vendedores.create')}}">Adicionar vendedor</button><br>


@endsection