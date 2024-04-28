@extends('layouts.app')

@section('content')
    <div class="container">

        <form id="form_cadastro" action="{{ route('servico.atualizar', ['item_id' => $servico->item_id]) }}" method="POST">
            @method('PUT')
            @csrf
            <div id="form_cadastro_conteudo">

                <div id="form_cadastro_header">

                    <a id="cadastro_voltar" href="{{ route('servicos.index') }}">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>

                    <h1 id="form_title">Editar Serviço</h1>
                </div>

                <hr id="linha_cadastro">

                <div id="form_cadastro_dados">

                    <input type="hidden" name="item_id" value="{{ $item->item_id }}">
                    <div class="id-cadastro">
                        <label for="id" class="label-form">ID</label>
                        <input type="number" name="id" id="id" class="form-input" value="0" readonly>
                    </div>

                    <div id="form_cadastro_inputs">

                        <div class="cadastro-input-field">
                            <label for="servico">Nome do Serviço</label>
                            <input type="text" name="nome" id="servico" class="form-input"
                                value="{{ $item->nome }}" />
                        </div>


                        <div class="cadastro-input-field">
                            <label for="servico">Descrição</label>
                            <textarea type="text" name="descricao" id="servico" class="form-input" rows="4">{{ $item->descricao }}</textarea>
                        </div>

                        <div class="cadastro-input-field">
                            <label for="imagem">Imagem</label>
                            <input type="file" name="imagem" id="imagem" class="form-control-file" >
                        </div>

                        <div id="input-inline">

                            <div class="cadastro-input-field">
                                <label for="servico">Valor</label>
                                <input type="text" name="valor" id="servico" class="form-input"
                                    value="{{ $item->valor }}" />
                            </div>

                            <div id="tipo_item" class="cadastro-input-field">
                                <label for="servico">Tipo de Item</label>
                                <input type="text" name="tipo_item" id="servico" class="form-input" value="Serviço"
                                    readonly />
                            </div>

                            <div class="cadastro-input-field">
                                <label for="servico">Provedor</label>
                                <input type="text" name="provedor" id="servico" class="form-input"
                                    value="{{ $servico->provedor }}" />
                            </div>

                        </div>

                    </div>

                </div>

                <div id="buttons">
                    <button id="btn_limpar" type="reset">Limpar</button>
                    <button id="btn_cadastrar" type="submit">Salvar</button>
                </div>

            </div>

            <div>
                <img class="img-lateral" src="../images/img-editar-servico.png" alt="teste">
            </div>

        </form>
    </div>
@endsection
