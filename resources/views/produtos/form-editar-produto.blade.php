@extends('layouts.app')

@section('content')
    <div class="container">

        <form enctype="multipart/form-data" id="form_cadastro" action="{{ route('produto.atualizar', ['item_id' => $produto->item_id] )}}" method="POST">
            @method('PUT')
            @csrf
            <div id="form_cadastro_conteudo"> 

                <div id="form_cadastro_header">

                    <a id="cadastro_voltar" href="{{ route('produto.index') }}">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    
                    <h1 id="form_title">Editar Produto</h1>
                </div>
                
                <hr id="linha_cadastro">

                <div id="form_cadastro_dados">
                    
                    <div class="id-cadastro">
                        <label for="id" class="label-form">ID</label>
                        <input type="number" name="id" id="id" class="form-input" value="0" readonly>
                    </div>

                    <div id="form_cadastro_inputs">

                        <div class="cadastro-input-field">
                            <label for="produto">Nome do Produto</label>
                            <input type="text" name="nome" id="produto" class="form-input" 
                            value="{{ $item->nome }}"/>
                        </div>

                        
                        <div class="cadastro-input-field">
                            <label for="produto">Descrição</label>
                            <textarea type="text" name="descricao" id="produto" class="form-input" 
                             rows="4">{{ $item->descricao }}</textarea>
                        </div>

                        <div class="cadastro-input-field">
                            <label for="imagem">Imagem</label>
                            <input type="file" name="imagem" id="imagem" class="form-control-file">
                        </div>

                        <div id="input-inline">

                            <div class="cadastro-input-field">
                                <label for="produto">Valor</label>
                                <input type="text" name="valor" id="produto" class="form-input" 
                                    value="{{ $item->valor }}"/>
                            </div>

                            <div id="tipo_item" class="cadastro-input-field">
                                <label for="produto">Tipo de Item</label>
                                <input type="text" name="tipo_item" id="produto" class="form-input" 
                                    value="Produto" readonly/>
                            </div>                          

                            <div class="cadastro-input-field">
                                <label for="produto">Estoque</label>
                                <input type="text" name="estoque" id="produto" class="form-input" 
                                    value="{{ $produto->estoque }}"/>
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
                <img class="img-lateral" src="../images/img-editar-produto.png" alt="teste">
            </div>

        </form>
    </div>
@endsection