<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Editora</title>
</head>
    <body>
        <h1>Cadastro de Editora</h1>
        @if(session('success'))
            <p style="color:green">{{ session('success') }}</p>
        @endif

        <form action="{{route('editora.salvar')}}" method="POST">
            @csrf
            <label for="nome_editora">setor: </label>
            <input type="text" name="nome" placeholder="Editora">
            <br><br>

            <input type="submit" value="Cadastrar">  
        </form>
    </body>
</html>