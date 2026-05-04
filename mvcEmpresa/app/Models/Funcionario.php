<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Funcionario extends Model
{
        protected $table = 'funcionarios';
    protected $fillable = [
        'nome', 
        'sobrenome',
        'cargo', 
        'email', 
        'data_admissao', 
        'salario',
        'departamento_id',
    ];

    public function departamento(){
        return $this->belongsTo(Departamento::class);
    }

    public function detalhe(){
        return $this->hasMany(Informacoes::class);
    }

}