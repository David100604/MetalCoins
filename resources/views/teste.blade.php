@extends('layouts.app')

@section('content')

<div class = "container">

<h1>Minha primeira página em laravel</h1>
<p>Rumo ao desenvolvimento moderno</p>
<hr />
<p>Seja bem-vindo {{$nome}} </p>

<h2>Minhas disciplinas:</h2>
<ul class= "list-group">
@foreach($disciplinas as $disciplina  )

<li class="list-group-item btn btn-primary ">{{$disciplina}}</li>



@endforeach
</ul>

<div class ="text-center">
<a class="btn btn-outline-secondary my-2 " href="{{ route('Inicio') }}">Voltar para o inicio</a>
</div>
</div>

@endsection