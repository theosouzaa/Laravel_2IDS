<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Setores;

use Illuminate\Http\Request;

class SetorApiController extends Controller
{
    public function listarApi(){
        $setores = Setores::all();
        return response()->json($setores);
    }

    public function addApi(Request $request){
        $request->validate([
        'nome' => 'required|string|max:255',
        'num_corredor' => 'required|integer',
    ]);
        
    Setores::create([
        'nome' => $request->nome,
        'num_corredor' => $request->num_corredor,
    ]);

        return responce()->json([
            'message' => 'Setor Criado',
            'setor' => $setor
        ], 200);
    }
}