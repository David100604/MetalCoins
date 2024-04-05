<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inicio');
})->name('Inicio');


Route::get("teste",[App\Http\Controllers\TesteController::class, 'index'])->name('teste');

Route::get('disciplinas',
             [\App\Http\Controllers\DisciplinaController::class, 'index']) 
             ->name('disciplinas.index');   

Route::get('disciplina/editar',
           [\App\Http\Controllers\DisciplinaController::class,'edit'])
           ->name('disciplina.editar');

Route::put('atualizar{id}',
           [\App\Http\Controllers\DisciplinaController::class,'update'])
           ->name('atualizar');

Route::get('disciplina/novo',
           [\App\Http\Controllers\DisciplinaController::class,'create'])
           ->name('disciplina.novo');

Route::post('disciplina/incluir',
           [\App\Http\Controllers\DisciplinaController::class,'store'])
           ->name('disciplina.incluir');

Route::get('disciplina/{id}/delete',
           [\App\Http\Controllers\DisciplinaController::class,'destroy'])
           ->name('disciplina.excluir');

Route::get('perfil',
       [\App\Http\Controllers\PerfilController::class,'index'])
       ->name('perfil');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
