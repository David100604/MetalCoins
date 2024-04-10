@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="card p-2 form-dn" action="{{ route('produto.atualizar', ['item_id' => $produto->item_id]) }}" method="POST">

            @method('PUT')
            @csrf

            <div class="card-header">
                <div class="card-title">
                    Editando Produto
                </div>
            </div>

            <div class="card-body">
                <a href="{{ route('produto.novo') }}"></a>
                <div class="form-group">
                    <label for="id" class="label-form">ID</label>
                    <input type="number" name="id" id="id" class="form-control" value="{{ $produto->produto_id }}" readonly>
                </div>

                <div class="form-group">
                    <label for="produto" class="label-form">Nome</label>
                    <input type="text" name="nome" id="produto" class="form-control" 
                    value="{{ $item->nome }}"/>

                    <label for="produto" class="label-form">Descrição</label>
                    <input type="text" name="descricao" id="produto" class="form-control" 
                        value="{{ $item->descricao }}"/>

                    <label for="produto" class="label-form">Valor</label>
                    <input type="text" name="valor" id="produto" class="form-control" 
                        value="{{ $item->valor }}"/>

                    <label for="produto" class="label-form">Tipo de Item</label>
                    <input type="text" name="tipo_item" id="produto" class="form-control" 
                        value="Produto" readonly/>

                    <label for="produto" class="label-form">Estoque</label>
                    <input type="text" name="estoque" id="produto" class="form-control" 
                        value="{{ $produto->estoque }}"/>
            </div>

            <div class="card-footer">

                <button type="submit" class="btn btn-info shadow">Atualizar</button>
                <button type="reset" class="btn btn-dark shadow">Limpar</button>

            </div>

        </form>
    </div>
@endsection