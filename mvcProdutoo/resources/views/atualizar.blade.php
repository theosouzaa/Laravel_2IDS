<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de produtos - Atualizar</title>
</head>
    <body>
        <h1>Controle de Produtos - Atualizar</h1>
        @if(session('success'))
            <p style="color:green">{{ session('succes')}}</p>
        @endif

        <form action="{{route('produto.update', $produto->id)}}" method="POST"></form>
        @csrf
        @method('PUT')
    </body>
</html>