@extends('layouts.app')

@section('content')

<div id="tabela_container">
    
    <div id="conteudo">
        
        <div id="tabela_header">
            <a id="tabela_voltar" href="{{ route('produto.index') }}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2>Produtos</h2>
        </div>

        <div id="tabela_topo">
            <div id="tabela_filtro">
                <label>
                    <a id="primeiro" href="">
                        <button><span>Usuários</span></button>
                    </a>
                </label>

                <label id="selecionado">
                    <a href="{{ route('produto.index') }}">
                        <button><span>Produtos</span></button>
                    </a>
                </label>

                <label class="filtro">
                    <a href="{{ route('servicos.index') }}">
                        <button><span>Serviços</span></button>
                    </a>
                </label>
            </div>

            <a href="{{route('produto.novo')}}" id="btn_novo">
                Novo
            </a>
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
                            <th>Estoque</th>
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
                        </tr>
                        @endif

                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="lateral_tabela">
                <form class="tabela_pesquisa" action="#" method="GET">
                    <input type="search" name="search" placeholder="Pesquisar" required>
                    <div >
                        <button id="botao_pesquisa" type="submit">Buscar</button>
                    </div>  
                </form>

                <div id="tabela_acoes">
                    <a href="{{ route('produto.editar',
                    ['item_id' => $item->item_id])}}" 
                    id="btn_editar">Editar</a>

                    <a href="{{ route('produto.excluir', 
                    ['item_id' => $item->item_id])}}" 
                    id="btn_excluir">Excluir</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection