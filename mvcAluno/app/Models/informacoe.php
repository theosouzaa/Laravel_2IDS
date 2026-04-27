<?php

namespace App\Models;

class Informacoes extends Model
{
    protected $fillable = [
	'endereco',
    'telefone',
    'idade',
    'data_nascimento'
    ];

    public function aluno(){
        return $this->belongsTo(Aluno::class);
    }
}