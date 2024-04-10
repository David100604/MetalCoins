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

Route::get('/produtos', 
            [\App\Http\Controllers\ProdutoController::class, 'index'])
            ->name('produto.index');

Route::post('/produto/incluir', 
            [\App\Http\Controllers\ProdutoController::class, 'store'])
            ->name('produto.incluir');


Route::get('/produto/novo', 
            [\App\Http\Controllers\ProdutoController::class, 'create'])
            ->name('produto.novo');

Route::get('/produto/{item_id}/excluir',
            [App\Http\Controllers\ProdutoController::class, 'destroy'])
            ->name('produto.excluir');

Route::put('/produto/atualizar/{item_id}',
            [App\Http\Controllers\ProdutoController::class, 'update'])
            ->name('produto.atualizar');

Route::get('/produto/editar',
            [App\Http\Controllers\ProdutoController::class, 'edit'])
            ->name('produto.editar');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
