<?php

return[

    'custom' => [
        'nome' => [
            'required' => 'O nome é obrigatório',
            'max' => 'O nome deve ter no máximo :max caracteres.'
        ],
        'num_setor' => [
            'required' => 'O número do setor é obrigatório.',
            'numeric' => 'O numero do setor deve ser númerico',
            'max' => 'O número do setor não pode ser maior que :max.'
        ],
        'quantidade' => [
            'required' => 'O campo quantidade é obrigatório',
        ],
        'preco' => [
            'required' => 'O campo preco é obrigatório',
            'numeric' => 'O numero do preço deve ser númerico',

        ],
    ],
    
];