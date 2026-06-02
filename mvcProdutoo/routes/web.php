<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


// Rota login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Rotas para fazer login
Route::post('/autenticar', [UserController::class, 'autenticar'])
    ->name('login.autenticar');

Route::get('/usuario/cadastrar', function () {
    return view('cadastroUsuario');
});

Route::post('/usuario/slavar', [UserController::class, 'add'])
    ->name('usuario.salvar');

// Listar os produtos cadastrados
Route::get('/produto/listar', [ProdutoController::class, 'listar'])
    ->name('produto.listar');


// Rota para se cadastrar para depois acessar as outras páginas
Route::middleware('auth')->group(function () {

    Route::get('/produto/cadastrar', [ProdutoController::class, 'cadastro'])
        ->name('produto.cadastro');

    // POST - enviar os dados para cadastrar usuários
    Route::post('/produto/salvar', [ProdutoController::class, 'add'])
        ->name('produto.salvar');

    // Tela de Atualizar
    Route::get('/produto/{id}/atualizar', [ProdutoController::class, 'atualizar'])
        ->name('produto.atualizar');

    Route::put('/produto/{id}/update', [ProdutoController::class, 'update'])
        ->name('produto.update');

    Route::delete('/produto/{id}', [ProdutoController::class, 'deletar'])
        ->name('produto.deletar');

    Route::get('/setor/cadastrar', function () {
        return view('cadastroSetor');
    })->name('setor.cadastro');

    Route::post('/setor/salvar', [SetorController::class, 'add'])
        ->name('setor.salvar');


    Route::get('/setor/listar', [SetorController::class, 'listar'])
        ->name('setor.listar');
});
