@extends('layout')
@section('conteudo')
<form action="{{route('clientes.update', ['id'=>$cliente->id_cliente])}}" enctype="multipart/form-data" method="post">
@csrf
@method('patch')

Nome: <input type="text" name="nome" value="{{$cliente->nome}}"><br>
@if($errors->has('nome'))
Deverá indicar um nome correto!<br>
@endif

Morada: <input type="text" name="morada" value="{{$cliente->morada}}"><br>
@if($errors->has('morada'))
Deverá indicar uma morada correta!<br>
@endif

Telefone: <input type="text" name="telefone" value="{{$cliente->telefone}}"><br>
@if($errors->has('telefone'))
Deverá indicar um numero de telefone correto!<br>
@endif

Email: <input type="text" name="email" value="{{$cliente->email}}"><br>
@if($errors->has('email'))
Deverá indicar um email correto!<br>
@endif

Imagem : <input type="file" name="imagem" value="{{$cliente->imagem}}"><br>
@if ( $errors->has('imagem') )
Deverá indicar uma imagem correta<br>
@endif
<input type="submit" value="enviar">
</form>

@endsection 