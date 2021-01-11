<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('titulo-pagina')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
</head>
<body>
    <h1 style="color: #00ff00;">@yield('header')</h1>
    @yield('conteudo')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="{{route('clientes.index')}}">Clientes</a>
      <a class="nav-item nav-link" href="{{route('encomendas.index')}}">Encomendas</a>
      <a class="nav-item nav-link" href="{{route('produtos.index')}}">Produtos</a>
      <a class="nav-item nav-link" href="{{route('vendedores.index')}}">Vendedores</a>

    </div>
  </div>
</nav>
</body>
</html>