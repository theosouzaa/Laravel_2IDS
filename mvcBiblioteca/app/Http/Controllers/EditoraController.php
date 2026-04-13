<?php

namespace App\Http\Controllers;
use App\Models\Livro;
use App\Models\Editoras;

use Illuminate\Http\Request;

class EditoraController extends Controller
{
    public function listar(){
        $query = Editoras::query();
        $Editoras = $query->get();
        return view('listar', compact('Editoras'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'CNPJ' => 'required|integer',
            'pais' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',

        ]);
        
        Editoras::create([
            'nome' => $required->nome,
            'CNPJ' => $required->CNPJ,
            'pais' => $required->pais,
            'cidade' => $required->cidade,

        ]);
        
        return redirect()->back()->with('success', 'Editora Cadastrada com sucesso!');
    }

}