<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EditoraController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/livro/listar', [LivroController::class, 'listar']) -> name('livro.listar');

Route::get('/livro/cadastrar', [LivroController::class, 'cadastro']
)->name('livro.cadastro');

Route::post('/livro/salvar', [LivroController::class, 'add'])
->name('livro.salvar');




Route::get('/editora/cadastrar', function(){
    return view('cadastroEditora');
})->name('editora.cadastro');

Route::post('/editora/salvar', [SetorController::class, 'add'])
->name('editora.salvar');