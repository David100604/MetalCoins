@extends('layouts.app')

@section('content')

<body>
    <h1 class="catalog-title">Catálogo de Serviços<h1>
    <div class="catalog">
        @foreach ($itens as $item)
            @if($item)
                @if ($item->servicos)
                    <div class="catalog-item">
                    <img src="{{ asset('images/servico/' . $item->imagem) }}" alt="{{ $item->nome }}">
                        <div class="catalog-item-info">
                            <h3>{{ $item->nome }}</h3>
                            <p>{{ $item->descricao }}</p>
                            <p>Valor: R${{ $item->valor }}</p>
                            <p>Estoque: {{ $item->servicos->provedor }}</p>
                        </div>
                    </div>
                @endif
            @endif
        @endforeach
    </div>
</body>

@endsection