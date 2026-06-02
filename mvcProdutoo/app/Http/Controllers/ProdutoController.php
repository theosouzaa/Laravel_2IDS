<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Setores;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function listar(Request $request){
        try {
            $query = Setores::query();
            
            // Filtro por nome
            // Select * from setores where nome like %VAR%
            if ($request->filled('nome')) {
                $query->where('nome', 'like', '%'.$request->nome . '%');
            }

            $setores = $query->get();

            return view('listarSetores', compact('setores'));

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function add(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
        ]);

        Produto::create([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'preco' => $request->preco,
            'setor_id' => $request->setor_id
        ]);

        return redirect()->back()->with('success', 'Produto Cadastrado com sucesso!');
    }

    public function cadastro(){
        if (auth()->user()->tipo != 'usuario') {
            abort(403);
        }

        $setores = Setores::get();
        return view('cadastro', compact('setores'));
    }

    public function atualizar($id){
        $produto = Produto::findOrFail($id);  // Buscar o pelo ID
        return view('atualizar', compact('produto'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|int',
            'preco' => 'required|numeric',
        ]);

        $produto = Produto::findOrFail($id); // Busca o produto para ser atualizado

        $produto->nome = $request->nome; // Atualizando o campo nome
        $produto->quantidade = $request->quantidade; //atualizando o campo quantidade
        $produto->preco = $request->preco; //atualizando o campo preco

        $produto->save(); // Salvando no banco de dados(fazendo update)
        return redirect()->back()->with('success', 'Produto atualizado com sucesso');
    }

    public function deletar($id){
        $produto = Produto::findOrFail($id); // Buscar o produto pelo ID
        $produto->delete(); // Deletar o produto do banco de dados
        return redirect()->route('produto.listar')->with('success', 'Produto deletado com sucesso!');
    }
}
