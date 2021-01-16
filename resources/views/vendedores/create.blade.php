<form action="{{route('vendedores.store')}}"  enctype="multipart/form-data" method="post">
@csrf

Nome: <input type="text" name="nome" value="{{old('nome')}}"><br>
@if($errors->has('nome'))
Deverá indicar um nome correto!<br>
@endif

Especialidade: <input type="text" name="especialidade" value="{{old('especialidade')}}"><br>
@if($errors->has('especialidade'))
Deverá indicar uma especialidade correta!<br>
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