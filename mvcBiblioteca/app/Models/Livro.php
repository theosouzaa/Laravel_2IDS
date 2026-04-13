<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Livro extends Model
{
    protected $fillable = [
    'nome',
    'autor',
    'descricao',
    'numPaginas',
    'dataPublicacao',
    'editora',
    'custo',
    'preco',
    'imposto',
    'editora_id'
    ];

    public function editora(){
        return $this->belongsTo(Editoras::clas);
    }
}