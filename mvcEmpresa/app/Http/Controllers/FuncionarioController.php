<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Departamento;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric',
            'data_admissao' => 'required|date',
            'departamento_id' => 'nullable|exists:departamento,id',
        ]);

        Funcionario::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'email' => $request->email,
            'cargo' => $request->cargo,
            'salario' => $request->salario,
            'data_admissao' => $request->data_admissao,
            'departamento_id' => $request->departamento_id,
        ]);

        return redirect()->back()->with('success', 'Funcionário cadastrado com sucesso!');
    }

    public function listar()
    {
        $funcionarios = Funcionario::all();
        return view('listarFuncionario', compact('funcionarios'));
    }

    public function cadastro()
    {
        $departamentos = Departamento::all();
        return view('cadastroFuncionario', compact('departamentos'));
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric',
            'data_admissao' => 'required|date',
            'departamento_id' => 'nullable|exists:departamento,id',
        ]);

        Funcionario::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'email' => $request->email,
            'cargo' => $request->cargo,
            'salario' => $request->salario,
            'data_admissao' => $request->data_admissao,
            'departamento_id' => $request->departamento_id,
        ]);

        return redirect()->back()->with('success', 'Funcionário cadastrado com sucesso!');
    }

    public function atualizar($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $departamentos = Departamento::all();
        return view('atualizarFuncionario', compact('funcionario', 'departamentos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionarios,email,' . $id,
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric',
            'data_admissao' => 'required|date',
            'departamento_id' => 'nullable|exists:departamento,id',
        ]);

        $funcionario = Funcionario::findOrFail($id);

        $funcionario->nome = $request->nome;
        $funcionario->sobrenome = $request->sobrenome;
        $funcionario->email = $request->email;
        $funcionario->cargo = $request->cargo;
        $funcionario->salario = $request->salario;
        $funcionario->data_admissao = $request->data_admissao;
        $funcionario->departamento_id = $request->departamento_id;

        $funcionario->save();

        return redirect()->route('funcionarios.listar')->with('success', 'Funcionário atualizado com sucesso!');
    }
}