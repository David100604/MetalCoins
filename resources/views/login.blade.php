@extends('layouts.app')

@section('content')

<main id="login_container">
    <form id="login_form">
        <div id="login_form_header">
            <h1>Login</h1>
        </div>

        <div id="login_inputs">

            <div class="login-input-box">
                <label for="username">
                    Nome de Usuário
                    <div class="login-input-field">
                        <input type="text" id="username" name="username">
                    </div>
                </label>
            </div>

            <div class="login-input-box">
                <label for="password">
                    Senha
                    <div class="login-input-field">
                        <input type="password" id="password" name="password">
                    </div>
                </label>
            </div>
        </div>

        <div id="login_buttons">

            <div class="login-button">
                <button type="submit" id="login_button">
                    Entrar
                </button>
            </div>

            <div class="login-button">
                <button type="submit" id="forgot_password">
                    Esqueci minha senha
                </button>
            </div>

        </div>
        
    </form>
</main>
  

@endsection