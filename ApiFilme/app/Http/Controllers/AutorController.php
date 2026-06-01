<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Autor;

use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function listar(Request $request){
        try {
            $query = Autor::query();

            // Filtro por nome
            // Select * from autores where nome like %VAR%
            if ($request->filled('nome')) {
                $query->where('nome', 'like', '%' . $request->nome . '%');
            }

            // Filtro por telefone
            if ($request->filled('telefone')) {
                $query->where('telefone', $request->telefone);
            }

            $Autores = $query->get();

            return view('ListarAutor', compact('Autores'));
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro interno do servidor",
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}
