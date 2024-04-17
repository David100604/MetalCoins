@extends('layouts.app')

@section('content')

<form class="card" action="{{route('servico.atualizar', ['item_id' => $servico->item_id])}}" method="POST">
    @method('PUT')
    @csrf

    <div class="card-header">
        <div class="card-title">
            Editar Serviço
        </div>
    </div>

    <div class="card-body">
        <div class="form-group">
            <label for="servico_id" class="label-form">ID do serviço</label>
            <input type="number" name="servico_id" id="servico_id" class="form-control" 
                   value="{{ $servico->servico_id }}" readonly/>
        </div>
        <div class="form-group">
            <label for="nome" class="label-form">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" 
                   value="{{ $item->nome }}" required/>
        </div>
        <div class="form-group">
            <label for="descricao" class="label-form">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" 
                   value="{{ $item->descricao }}" required/>
        </div>
        <div class="form-group">
            <label for="valor" class="label-form">Valor</label>
            <input type="text" name="valor" id="valor" class="form-control" 
                   value="{{ $item->valor }}" required/>
        </div>
        <div class="form-group">
            <label for="provedor" class="label-form">Provedor</label>
            <input type="text" name="provedor" id="provedor" class="form-control" 
                   value="{{ $servico->provedor }}" required/>
        </div>
    </div>

    <div class="card-footer text-center">
        <a href="{{route('servicos.index')}}" class="btn btn-primary">
            Voltar
        </a>
        <button type="reset" class="btn btn-secondary">Limpar</button>
        <button type="submit" class="btn btn-danger">Atualizar</button>
    </div>
</form>

@endsection