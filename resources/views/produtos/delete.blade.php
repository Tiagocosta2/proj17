<h2>Deseja eleminar o cliente</h2>
<h2>{{$produto->designacao}}</h2>
<form action="{{route('produtos.destroy', ['id'=>$produto->id_produto])}}" method="post">
	@csrf
	@method('delete')

	<input type="submit" name="enviar">
	
</form>