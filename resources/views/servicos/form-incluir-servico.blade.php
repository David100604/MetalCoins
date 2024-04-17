
@extends('layouts.app')

@section('content')

<form class="card" action="{{route('servico.incluir')}}" method="POST">

    @csrf

    <div class="card-header">
        <div class="card-title">
            Cadastrar Serviço
        </div>
    </div>

    <div class="card-body">
        <div class="form-group">
            <label for="id" class="label-form">ID do serviço</label>
            <input type="number" name="id" id="id" class="form-control" 
                   value="0" readonly/>
        </div>
        <div class="form-group">
            <label for="servico" class="label-form">Nome</label>
            <input type="text" name="nome" id="servico" class="form-control" 
                   value="" required/>

            <label for="servico" class="label-form">Descrição</label>
            <input type="text" name="descricao" id="servico" class="form-control" 
                   value="" required/>

            <label for="servico" class="label-form">Valor</label>
            <input type="text" name="valor" id="servico" class="form-control" 
                   value="" required/>

            <label for="servico" class="label-form">Tipo de Item</label>
            <input type="text" name="tipo_item" id="servico" class="form-control" 
                   value="Serviço" readonly/>

            <label for="servico" class="label-form">Provedor</label>
            <input type="text" name="provedor" id="servico" class="form-control" 
                   value="" required/>
        </div>
    </div>

    <div class="card-footer text-center">
        <a href="{{route('servicos.index')}}" class="btn btn-primary">
            Voltar
        </a>
        <button type="reset" class="btn btn-secondary">Limpar</button>
        <button type="submit" class="btn btn-danger">Adicionar</button>
    </div>
</form>

@endsection