<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Editoras extends Model
{
    protected $fillable = [
        'nome',
        'CNPJ',
        'pais',
        'cidade',
        'editora_id',
    ];

    public function editora(){
        return $this->hasMany(Editoras::class);
    }

}