@extends('layout')
@section('conteudo')
<form action="{{route('encomendas.update', ['id'=>$encomenda->id_encomenda])}}" method="post">
@csrf
@method('patch')

Cliente: 
<select name="id_cliente">
    @foreach($clientes as $cliente)
    <option value="{{$cliente->id_cliente}}">{{$cliente->nome}}</option>
    @endforeach
    @if($errors->has('id_cliente'))
    Deverá indicar um cliente correto<br>
    @endif
</select>    

Vendedor: 
<select name="id_vendedor">
    @foreach($vendedores as $vendedor)
    <option value="{{$vendedor->id_vendedor}}">{{$vendedor->nome}}</option>
    @endforeach
@if($errors->has('id_vendedor'))
Deverá indicar um vendedor correto!<br>
@endif
</select>

Produto:
<select name="id_produto">
    @foreach($produtos as $produto)
    <option value="{{$produto->id_produto}}">{{$produto->designacao}}</option>
    @endforeach
@if($errors->has('id_produto'))
Deverá indicar um produto correto!<br>
@endif


Data: <input type="date" name="data" value="{{$encomenda->data}}"><br>
@if($errors->has('data'))
Deverá indicar uma data correta!<br>
@endif

Observaçoes: <textarea name="observacoes" value="{{$encomenda->observacoes}}" ></textarea><br>
@if($errors->has('observacoes'))
Deverá indicar uma observação  correto!<br>
@endif
<input type="submit" value="enviar">
</form>

@endsection