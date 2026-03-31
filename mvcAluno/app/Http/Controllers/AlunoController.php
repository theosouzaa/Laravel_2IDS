<?php

namespace App\Http\Controllers;
use App\Models\Aluno;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function listar(){
        $query = Aluno::query();
        $alunos = $query->get();
        return view('listar', compact('alunos'));
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:alunos,email',
            'turma_id' => 'nullable|exists:turmas,id' // Para poder existir na tabela de turmas
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'turma_id' => $request->turma_id
        ]);

        return redirect()->back()->with('sucsess', 'Aluno Cadastrado com sucesso!');

    }

    public function atualizar($id){
        $aluno = Aluno::findOrFail($id);  // Buscar o aluno pelo ID
        return view('atualizar', compact('aluno'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => "required|string|max:255|unique:alunos,email,$id"
        ]);

        $aluno = Aluno::findOrfail($id); // Busca aluno para ser atualizado

        $aluno->nome = $request->nome; // Atualizando o campo nome
        $aluno->email = $request->email; //atualizando o campo email

        $aluno->save(); // Salvando no banco de dados(fazendo update)
        return redirect()->back()->with('success', 'Aluno atualizado com sucesso');
    }

    public function deletar($id){
        $aluno = Aluno::findOrFail($id); // Buscar o aluno para depois deletar
        $aluno->delete(); // Faz o delete no banco de dados

        return redirect()->route('aluno.listar')->with('success', 'Aluno excluído com sucesso!');
    }

}