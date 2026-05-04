<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\FuncionarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/funcionarios/listar', [FuncionarioController::class, 'listar'])
->name('funcionarios.listar');

Route::get('/funcionarios/cadastrar',[FuncionarioController::class, 'cadastro']
)->name('funcionarios.cadastro');

Route::post('/funcionarios/salvar',[FuncionarioController::class, 'salvar']
)->name('funcionarios.salvar');

Route::get('/funcionarios/{id}/atualizar', [FuncionarioController::class, 'atualizar'])
->name('funcionarios.atualizar');

Route::put('/funcionarios/{id}/update', [FuncionarioController::class, 'update'])
->name('funcionarios.update');

Route::get('/departamentos/cadastrar', function(){
    return view('cadastroDepartamento');
})->name('departamentos.cadastro');

Route::post('/departamentos/salvar', [DepartamentoController::class, 'add'])
->name('departamentos.salvar');

Route::get('/departamentos/listar', [DepartamentoController::class, 'listar'])
->name('departamentos.listar');