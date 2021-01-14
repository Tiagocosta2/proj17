<h2>Deseja eleminar o cliente</h2>
<h2>{{$cliente->nome}}</h2>
<form action="{{route('clientes.destroy', ['id'=>$cliente->id_cliente])}}" method="post">
	@csrf
	@method('delete')

	<input type="submit" name="enviar">
	
</form>