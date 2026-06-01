<?php

namespace App\Http\Controllers;
use App\Models\Filme;
use App\Models\Autor;

use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function listar(Request $request){
        try {
            $query = Filme::query();

            // Filtro por nome
            // Select * from autores where nome like %VAR%
            if ($request->filled('titulo')) {
                $query->where('titulo', 'like', '%' . $request->titulo . '%');
            }

            // Filtro por telefone
            if ($request->filled('dataLancamento')) {
                $query->where('dataLancamento', $request->dataLancamento);
            }

            $Filmes = $query->get();

            return view('ListarFilme', compact('Filmes'));
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }

}