@extends('layout')
@section('conteudo')
<table class="table">
	<thead>
		<tr>
			<th scope="col" style="text-align: center;">Data</th>
		</tr>
	</thead>
	<tbody>
<tr>

@foreach($encomendas as $encomenda)

<th scope="row" style="text-align: center;"><a href="{{route('encomendas.show', ['id'=>$encomenda->id_encomenda])}}">{{$encomenda->data}}</a></th>
<br>
@endforeach
</tr>
</tbody>
</table>
<button type="button" class="btn btn-outline-primary"><a href="{{route('encomendas.create')}}">Adicionar encomendas</button><br>
@endsection
<br>
<form method="post" action="{{route('processar.form')}}">
        @csrf
<label for="name"> Nome do Cliente </label>
<input type="text" name="caixa">
<button type="submit"> Enviar </button>
</form>


