@extends('layout')
<form action="{{route('produtos.store')}}" method="post">
@csrf
<div class="container-fluid">
	<br>
Designação: <input type="text" name="designacao" value="{{old('designacao')}}"><br>
@if($errors->has('designacao'))
Deverá indicar uma designação correta!<br>
@endif
<br>

Stock: <input type="text" name="stock" value="{{old('stock')}}"><br>
@if($errors->has('stock'))
Deverá indicar um stcok correto!<br>
@endif
<br>
preço: <input type="text" name="preco" value="{{old('preco')}}"><br>
@if($errors->has('preco'))
Deverá indicar um preço correto!<br>
@endif
<br>

Observaçoes: <textarea name="observacoes" ></textarea><br>
@if($errors->has('observacoes'))
Deverá indicar uma observação  correto!<br>
@endif
<br>
<input type="submit" value="Enviar">
</div>
</form>