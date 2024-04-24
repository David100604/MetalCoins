@extends('layouts.app')

@section('content')

<div id="tabela_container">
    
    <div id="conteudo">
        
        <div id="tabela_header">
            <a id="tabela_voltar" href="{{ route('servicos.index') }}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2>Serviços</h2>
        </div>

        <div id="tabela_topo">
            <div id="tabela_filtro">
                <label>
                    <a id="primeiro" href="">
                        <button><span>Usuários</span></button>
                    </a>
                </label>

                <label>
                    <a href="{{ route('produto.index') }}">
                        <button><span>Produtos</span></button>
                    </a>
                </label>

                <label id="selecionado">
                    <a href="{{ route('servicos.index') }}">
                        <button><span>Serviços</span></button>
                    </a>
                </label>
            </div>
            
            <a href="{{route('servico.novo')}}" id="btn_novo">Novo</a>
        </div>

        <div id="tabela_principal">
            <div id="scroll">
                <table id="tabela">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Provedor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resultados as $resultado)
                    
                        @if($resultado->servicos)
                        <tr data-id='{{ $resultado->item_id }}'>
                            <td>
                                {{$resultado->servicos->servico_id }}
                            </td>
                            <td>
                                {{ $resultado->nome }}
                            </td>
                            <td>
                                {{ $resultado->descricao }}
                            </td>
                            <td>
                                {{ $resultado->valor }}
                            </td>
                            <td>
                                {{ $resultado->servicos->provedor }}
                            </td>
                        </tr>
                        @endif

                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="lateral_tabela">

                <form class="tabela_pesquisa" action="{{ route('servico.pesquisar') }}" method="GET">
                    <input type="search" name="search" placeholder="Pesquisar" required>
                    <div>
                        <button id="botao_pesquisa" type="submit">Buscar</button>
                    </div>    
                </form>

                <div id="tabela_acoes">
                    <a href="{{ route('servico.editar',
                    ['item_id' => $resultado->item_id])}}" 
                    id="btn_editar">Editar</a>

                    <a href="{{ route('servico.excluir', 
                    ['item_id' => $resultado->item_id])}}" 
                    id="btn_excluir">Excluir</a>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection