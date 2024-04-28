<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/signin', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/home-admin', 'home-admin')
->name('home.admin');

Route::get('/produtos', 
            [\App\Http\Controllers\ProdutoController::class, 'index'])
            ->name('produto.index');

Route::post('/produto/incluir', 
            [\App\Http\Controllers\ProdutoController::class, 'store'])
            ->name('produto.incluir');


Route::get('/produto/novo', 
            [\App\Http\Controllers\ProdutoController::class, 'create'])
            ->name('produto.novo');

Route::get('/produto/excluir/{item_id}',
            [App\Http\Controllers\ProdutoController::class, 'destroy'])
            ->name('produto.excluir');

Route::put('/produto/atualizar/{item_id}',
            [App\Http\Controllers\ProdutoController::class, 'update'])
            ->name('produto.atualizar');

Route::get('/produto/editar',
            [App\Http\Controllers\ProdutoController::class, 'edit'])
            ->name('produto.editar');

Route::get('/produto/pesquisar',
            [App\Http\Controllers\ProdutoController::class, 'search'])
            ->name('produto.pesquisar');
            
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/servicos',
[App\Http\Controllers\ServicoController::class, 'index'])
->name('servicos.index');

Route::get('servico/editar',
[App\Http\Controllers\ServicoController::class, 'edit'])
->name('servico.editar');

Route::put('servico.atualizar/{item_id}',
[App\Http\Controllers\ServicoController::class, 'update'])
->name('servico.atualizar');

Route::get('/servico/novo',
[App\Http\Controllers\ServicoController::class, 'create'])
->name('servico.novo');

Route::post('/servico/incluir',
[App\Http\Controllers\ServicoController::class, 'store'])
->name('servico.incluir');

Route::get('/servico/excluir/{item_id}',
[App\Http\Controllers\ServicoController::class, 'destroy'])
->name('servico.excluir');

//PESQUISAR
Route::get('/servico/pesquisar',
[App\Http\Controllers\ServicoController::class, 'search'])
->name('servico.pesquisar');

//CATALOGO SERVIÇOS
Route::get('/catalogo', 
            [\App\Http\Controllers\ProdutoController::class, 'catalogo'])
            ->name('catalogo.index');

Route::get('/catalogo-servicos', [\App\Http\Controllers\ServicoController::class, 'catalogo'])
            ->name('catalogo-servicos.index');
