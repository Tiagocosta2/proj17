@extends('layout')
<form action="{{route('encomendas.store')}}" method="post">
@csrf
<br>
<div class="container-fluid">
Cliente: 
<select name="id_cliente">
    @foreach($clientes as $cliente)
    <option value="{{$cliente->id_cliente}}">{{$cliente->nome}}</option>
    @endforeach
    @if($errors->has('id_cliente'))
    Deverá indicar um cliente correto<br>
    @endif
</select>    
<br>
<br>

Vendedor: 
<select name="id_vendedor">
    @foreach($vendedores as $vendedor)
    <option value="{{$vendedor->id_vendedor}}">{{$vendedor->nome}}</option>
    @endforeach
@if($errors->has('id_vendedor'))
Deverá indicar um vendedor correto!<br>
@endif
</select>
<br>
<br>
Produto:
<select name="id_produto">
    @foreach($produtos as $produto)
    <option value="{{$produto->id_produto}}">{{$produto->designacao}}</option>
    @endforeach
@if($errors->has('id_produto'))
Deverá indicar um produto correto!<br>
@endif
</select>
<br>
<br>
Data: <input type="date" name="data" value="{{old('data')}}"><br>
@if($errors->has('data'))
Deverá indicar uma data correta!<br>
@endif
<br><br>
Observaçoes: <textarea name="observacoes" ></textarea><br>
@if($errors->has('observacoes'))
Deverá indicar uma observação  correto!<br>
@endif <br>
<input type="submit" value="Enviar">
</div>
</form>