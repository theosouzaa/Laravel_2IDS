<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Informacoes extends Model
{
    protected $table = 'informacoes';
    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'data_admissao'
    ];

    public function detalhe()
    {
        return $this->belongsTo(Funcionario::class);
    }
}