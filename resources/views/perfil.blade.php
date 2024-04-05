@extends('layouts.app')
@section('content')

<div class = "cornav">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('Inicio')}}">Pagina inicial <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Catalogo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Carrinho</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Voce possui</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Conta</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Suporte</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sair</a>
      </li>
    </ul>
  </div>
</nav>
</div>
</div>
<div class="wrapper">
<div class="jumbotron text-center">
    <h1 class="display-4">Teste</h1>
    <p class="lead"></p>
  </div>
</div>


