<?php

namespace App\Http\Controllers;
use App\Models\Livro;
use App\Models\editoras;

use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function listar(){
        $query = Livro::query();
        $Livros = $query->get();
        return view('listar', compact('Livros'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'numPaginas' => 'required|integer',
            'dataPublicacao' => 'required|date',
            'editora' => 'required|string|max:255',
            'custo' => 'required|integer',
            'preco' => 'required|numeric',
            'imposto' => 'required|integer',
        ]);

        Livro::create([
            'nome' => $request->nome,
            'autor' => $request->autor,
            'descricao' => $request->descricao,
            'numPaginas' => $request->numPaginas,
            'dataPublicacao' => $request->dataPublicacao,
            'editora' => $request->editora,
        ]);

        return redirect()->back()->with('success', 'Livro Cadastrado com sucesso!');
    }

    public function cadastro(){
        $editoras = Editoras::get();
        return view('cadastro', compact('editoras'));
    }

 }