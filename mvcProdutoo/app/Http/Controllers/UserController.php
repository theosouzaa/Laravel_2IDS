<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email', // Dois usuarios não podem ter o mesmo email
            'password' => 'required|min:6',
            'tipo' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo' => $request->tipo
        ]);

        return redirect()->back()->with('success', 'Usuario sadastrado com sucesso!');
    }

    public function autenticar(Request $request){
        $credenciais = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            //Ao fazer o logoin envia para a tela produto listar
            return redirect()->route('produto.listar');
        }
        
        return back()->withErrors(['email' => 'E-mail ou senha inválidos!']);
    }
}
