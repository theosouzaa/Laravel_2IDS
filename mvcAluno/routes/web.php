<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aluno/listar', [AlunoController::class, 'listar']) -> name('aluno.listar');

Route::get('/aluno/cadastrar', function(){
    return view('cadastro');
})->name('aluno.cadastro');

// POST - enviar os dados para cadastrar usuários
Route::post('/aluno/slavar', [Alunocontroller::class, 'add'])
->name('aluno.salvar');