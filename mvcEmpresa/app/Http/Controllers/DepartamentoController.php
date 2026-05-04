<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use App\Models\Departamento;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'setor' => 'required|string|max:255',
            'data_criacao' => 'required|date',
            'orcamento' => 'required|numeric',
            'sigla' => 'required|string|max:10|unique:departamento',
        ]);

        Departamento::create([
            'setor' => $request->setor,
            'data_criacao' => $request->data_criacao,
            'orcamento' => $request->orcamento,
            'sigla' => $request->sigla,
        ]);

        return redirect()->back()->with('success', 'Departamento cadastrado com sucesso!');
    }

    public function listar(){
        $query = Departamento::query();
        $departamentos = $query->get();
        return view('listarDepartamento', compact('departamentos'));
    }

   
}
