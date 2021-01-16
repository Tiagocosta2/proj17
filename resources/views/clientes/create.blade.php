<form action="{{route('clientes.store')}}" enctype="multipart/form-data" method="post">
@csrf

Nome: <input type="text" name="nome" value="{{old('nome')}}"><br>
@if($errors->has('nome'))
Deverá indicar um nome correto!<br>
@endif

Morada: <input type="text" name="morada" value="{{old('morada')}}"><br>
@if($errors->has('morada'))
Deverá indicar uma morada correta!<br>
@endif

Telefone: <input type="text" name="telefone" value="{{old('telefone')}}"><br>
@if($errors->has('telefone'))
Deverá indicar um numero de telefone correto!<br>
@endif

Email: <input type="text" name="email" value="{{old('email')}}"><br>
@if($errors->has('email'))
Deverá indicar um email correto!<br>
@endif

Imagem: <input type="file" name="imagem" value="{{old('imagem')}}"><br>
@if ( $errors->has('imagem') )
Deverá indicar uma imagem  correta<br>
@endif
<input type="submit" value="enviar">
</form>