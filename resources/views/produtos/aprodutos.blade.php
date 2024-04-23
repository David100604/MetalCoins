@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Produtos</h2>

    <table class="table table-hover table-dark table-striped">
        <thead>
            <tr>
                <th>ID do produto</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Estoque</th>
                <th width=10%>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($itens as $item)


            @if($item->produtos)
            <tr>
                <td>
                    {{ $item->produtos->produto_id }} 
                </td>
                <td>
                    {{ $item->nome }}
                </td>
                <td>
                    {{ $item->descricao }}
                </td>
                <td>
                    {{ $item->valor }}
                </td>
                <td>
                    {{ $item->produtos->estoque }}
                </td>
                <td class="actions-form">
                    <a href="{{ route('produto.editar', 
                        ['item_id' => $item->item_id])}}" 
                    class="btn btn-secondary btn-sm">Editar</a>

                    <a href="{{ route('produto.excluir', 
                        ['item_id' => $item->item_id])}}" 
                    class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
            @endif

            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="6">
                # Número de registros: {{ App\Models\Produto::count() }}
                </th>
            </tr>
        </tfoot>
    </table>

    <a href="{{route('produto.novo')}}" class="btn btn-info">
        Novo
    </a>
</div>

@endsection