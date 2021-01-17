@extends('layout')
@section('conteudo')
<form action="{{route('produtos.update', ['id'=>$produto->id_produto])}}" method="post">
@csrf
@method('patch')
<div class="container-fluid">
	<br>
Designação: <input type="text" name="designacao" value="{{$produto->designacao}}"><br>
@if($errors->has('designacao'))
Deverá indicar uma designação correta!<br>
@endif
<br>
Stock: <input type="text" name="stock" value="{{$produto->stock}}"><br>
@if($errors->has('stock'))
Deverá indicar um stcok correto!<br>
@endif
<br>
preço: <input type="text" name="preco" value="{{$produto->preco}}"><br>
@if($errors->has('preco'))
Deverá indicar um preço correto!<br>
@endif
<br>

Observaçoes: <textarea name="observacoes" value="{{$produto->observacoes}}" ></textarea><br>
@if($errors->has('observacoes'))
Deverá indicar uma observação  correto!<br>
@endif
<br>
<input type="submit" value="Enviar">
</div>
</form>

@endsection