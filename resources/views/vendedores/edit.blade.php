@extends('layout')
@section('conteudo')
<form action="{{route('vendedores.update', ['id'=>$vendedor->id_vendedor])}}" enctype="multipart/form-data" method="post">
@csrf
@method('patch')

Nome: <input type="text" name="nome" value="{{$vendedor->nome}}"><br>
@if($errors->has('nome'))
Deverá indicar um nome correto!<br>
@endif

Especialidade: <input type="text" name="especialidade" value="{{$vendedor->especialidade}}"><br>
@if($errors->has('especialidade'))
Deverá indicar uma especialidade correta!<br>
@endif

Email: <input type="text" name="email" value="{{$vendedor->email}}"><br>
@if($errors->has('email'))
Deverá indicar um email correto!<br>
@endif

Imagem : <input type="file" name="imagem" value="{{$vendedor->imagem}}"><br>
@if ( $errors->has('imagem') )
Deverá indicar uma imagem correta<br>
@endif
<input type="submit" value="enviar">
</form>
@endsection