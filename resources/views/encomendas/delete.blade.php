<h2>Deseja eleminar o cliente</h2>
<h2>{{$encomenda->data}}</h2>
<form action="{{route('encomendas.destroy', ['id'=>$encomenda->id_encomenda])}}" method="post">
	@csrf
	@method('delete')

	<input type="submit" name="enviar">
	
</form>