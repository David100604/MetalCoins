@extends('layouts.app')

@section('content')
    <div class="container">

        <form id="form_cadastro" action="{{ route('servico.incluir') }}" method="POST">

            @csrf
            <div id="form_cadastro_conteudo">

                <div id="form_cadastro_header">

                    <a id="cadastro_voltar" href="{{ route('servicos.index') }}">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    
                    <h1 id="form_title">Cadastrar Serviço</h1>
                </div>
                
                <hr id="linha_cadastro">

                <div id="form_cadastro_dados">
                    
                    <div class="id-cadastro">
                        <label for="id" class="label-form">ID</label>
                        <input type="number" name="id" id="id" class="form-input" value="0" readonly>
                    </div>

                    <div id="form_cadastro_inputs">

                        <div class="cadastro-input-field">
                            <label for="servico">Nome do Serviço</label>
                            <input type="text" name="nome" id="servico" class="form-input" 
                            value=""/>
                        </div>

                        <div class="cadastro-input-field">
                            <label for="servico">Descrição</label>
                            <textarea type="text" name="descricao" id="servico" class="form-input" 
                                rows="4"></textarea>
                        </div>

                        <div id="input-inline">

                            <div class="cadastro-input-field">
                                <label for="servico">Valor</label>
                                <input type="text" name="valor" id="servico" class="form-input" 
                                    value=""/>
                            </div>

                            <div id="tipo_item" class="cadastro-input-field">
                                <label for="servico">Tipo de Item</label>
                                <input type="text" name="tipo_item" id="servico" class="form-input" 
                                    value="Serviço" readonly/>
                            </div>                          

                            <div class="cadastro-input-field">
                                <label for="provedor">Provedor</label>
                                <input type="text" name="provedor" id="provedor" class="form-input" 
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

            <div>
                <img class="img-lateral" src="../images/img-cadastrar-servico.png" alt="teste">
            </div>

        </form>
    </div>
@endsection