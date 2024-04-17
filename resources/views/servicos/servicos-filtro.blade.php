@extends('layouts.app')

@section('content')
    <a href="{{route('servicos.index')}}" class="btn btn-primary m-2">
        Voltar
    </a>
    <a href="{{route('servico.novo')}}" class="btn btn-primary">
        Novo
    </a>
    <form class="form-control pt-3 pb-3" action="{{ route('servico.pesquisar') }}" method="GET">
        <input class="input-pesquisa" type="text" name="search" placeholder="Pesquisar serviço">
        <button type="submit">Buscar</button>
    </form>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID do serviço</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Provedor</th>
            <th width=10%>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($resultados as $resultado)

        <tr>
            <td>
                <li>{{ $resultado->servicos->item_id }}</li> 
            </td>
            <td>
                <li>{{ $resultado->nome }}</li>
            </td>
            <td>
                <li>{{ $resultado->descricao }}</li>
            </td>
            <td>
                <li>{{ $resultado->valor }}</li>
            </td>
            <td>
                <li>{{ $resultado->servicos->provedor }}</li>
            </td>
            <td>
                <a href="{{ route('servico.editar',
                ['item_id' => $resultado->item_id])}}" 
                class="btn btn-secondary btn-sm">Editar</a>

                <a href="{{ route('servico.excluir', 
                ['item_id' => $resultado->item_id])}}" 
                class="btn btn-danger btn-sm">Excluir</a>
            </td>
        </tr>

        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="6">
            # Número de registros: {{ App\Models\Servico::count() }}
            </th>
        </tr>
    </tfoot>
</table>

@endsection