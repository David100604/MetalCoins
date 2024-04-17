@extends('layouts.app')

@section('content')
    <div class="container">

        <form id="form_cadastro" action="{{ route('produto.incluir') }}" method="POST">

            @csrf
            <div id="form_cadastro_conteudo">

                <div id="form_cadastro_header">

                    <a id="cadastro_voltar" href="#">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    
                    <h1 id="form_title">Cadastrar Produto</h1>
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
                            value=""/>
                        </div>

                        <div class="cadastro-input-field">
                            <label for="produto">Descrição</label>
                            <textarea type="text" name="descricao" id="produto" class="form-input" 
                                value=""></textarea>
                        </div>

                        <div id="input-inline">

                            <div class="cadastro-input-field">
                                <label for="produto">Valor</label>
                                <input type="text" name="valor" id="produto" class="form-input" 
                                    value=""/>
                            </div>

                            <div id="tipo_item" class="cadastro-input-field">
                                <label for="produto">Tipo de Item</label>
                                <input type="text" name="tipo_item" id="produto" class="form-input" 
                                    value="Produto" readonly/>
                            </div>                          

                            <div class="cadastro-input-field">
                                <label for="produto">Estoque</label>
                                <input type="text" name="estoque" id="produto" class="form-input" 
                                    value=""/>
                            </div>

                        </div>

                    </div>

                </div>

                <div id="buttons">
                    <button id="btn_limpar" type="reset">Limpar</button>
                    <button id="btn_cadastrar" type="submit">Cadastrar</button>
                </div>

            </div>

            <div id="img_lateral">

            </div>

        </form>
    </div>
@endsection