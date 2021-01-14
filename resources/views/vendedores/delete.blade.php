<h2>Deseja eleminar o cliente</h2>
<h2>{{$vendedor->nome}}</h2>
<form action="{{route('vendedores.destroy', ['id'=>$vendedor->id_vendedor])}}" method="post">
	@csrf
	@method('delete')

	<input type="submit" name="enviar">
	
</form>