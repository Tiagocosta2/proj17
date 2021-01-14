@extends('layout')
@section('conteudo')
<form action="{{route('produtos.update', ['id'=>$produto->id_produto])}}" method="post">
@csrf
@method('patch')

Designação: <input type="text" name="designacao" value="{{$produto->designacao}}"><br>
@if($errors->has('designacao'))
Deverá indicar uma designação correta!<br>
@endif

Stock: <input type="text" name="stock" value="{{$produto->stock}}"><br>
@if($errors->has('stock'))
Deverá indicar um stcok correto!<br>
@endif

preço: <input type="text" name="preco" value="{{$produto->preco}}"><br>
@if($errors->has('preco'))
Deverá indicar um preço correto!<br>
@endif


Observaçoes: <textarea name="observacoes" value="{{$produto->observacoes}}" ></textarea><br>
@if($errors->has('observacoes'))
Deverá indicar uma observação  correto!<br>
@endif
<input type="submit" value="enviar">
</form>

@endsection