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
    @if(session()->has('mensagem1'))
  <div class="alert alert-danger" role="alert">
    {{session('mensagem1')}}
    </div>
    @endif
     @if(session()->has('mensagem2'))
  <div class="alert alert-success" role="alert">
    {{session('mensagem2')}}
    </div>
    @endif
    <h1 style="color: #00ff00;">@yield('header')</h1>
    @yield('conteudo')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="{{route('clientes.index')}}">Clientes</a>
      <a class="nav-item nav-link" href="{{route('encomendas.index')}}">Encomendas</a>
      <a class="nav-item nav-link" href="{{route('produtos.index')}}">Produtos</a>
      <a class="nav-item nav-link" href="{{route('vendedores.index')}}">Vendedores</a>
      @if(auth()->check())
      <a class="dropdown-item" href="{{ route('logout') }}"
         onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
       Logout
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
       @csrf
       @endif
    </div>
  </div>
</nav>

@if(auth()->check())
    {{Auth::user()->id}}<br>
    {{Auth::user()->email}}<br>
    {{Auth::user()->name}}<br>
@endif
</body>
</html>