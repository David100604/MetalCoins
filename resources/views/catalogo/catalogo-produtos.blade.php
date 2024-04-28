@extends('layouts.app')

@section('content')

<body>
    <h1 class="catalog-title">Explore nosso catálogo de produtos</h1>
    <div class="catalog">
        @foreach ($itens as $item)
            @if ($item->produtos)
                <div class="catalog-item">
                 <img src="{{ asset($item->produtos->imagem) }}" alt="{{ $item->nome }}">
                    <div class="catalog-item-info">
                        <h3>{{ $item->nome }}</h3>
                        <p>{{ $item->descricao }}</p>
                        <p>Valor: R${{ $item->valor }}</p>
                        <p>Estoque: {{ $item->produtos->estoque }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</body>

@endsection