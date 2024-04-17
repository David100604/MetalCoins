@extends('layouts.app')

@section('content')
    <h1 class="text-center p-2 pt-3">SERVIÇOS CADASTRADOS</h1>
    <form class="form-control pt-3 pb-3" action="{{ route('servico.pesquisar') }}" method="GET">
        <input class="input-pesquisa form-control" type="search" name="search" placeholder="Pesquisar serviço por nome" required>
            <div class="row mt-2">
                <div class="col"><button class="btn btn-primary" type="submit">Buscar</button></div>
                <div class="col" style="text-align: right;">
                    <a href="{{route('home.admin')}}" class="btn btn-primary">Voltar</a>
                    <a href="{{route('servico.novo')}}" class="btn btn-primary">Novo</a>
                </div>
            </div>    
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
        @foreach ($itens as $item)
        
        @if($item->servicos)
        <tr>
            <td>
                <li>{{ $item->servicos->item_id }}</li> 
            </td>
            <td>
                <li>{{ $item->nome }}</li>
            </td>
            <td>
                <li>{{ $item->descricao }}</li>
            </td>
            <td>
                <li>{{ $item->valor }}</li>
            </td>
            <td>
                <li>{{ $item->servicos->provedor }}</li>
            </td>
            <td>
                <a href="{{ route('servico.editar',
                ['item_id' => $item->item_id])}}" 
                class="btn btn-secondary btn-sm">Editar</a>

                <a href="{{ route('servico.excluir', 
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
            # Número de registros: {{ App\Models\Servico::count() }}
            </th>
        </tr>
    </tfoot>
</table>

@endsection