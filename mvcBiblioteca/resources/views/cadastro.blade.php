<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de livros</title>
</head>
    <body>
        <h1>Cadastro de livros</h1>
        @if(@session('success'))
            <p style="color: green">{{ session('succes') }}</p>
        @endif
        
        <form action="" method="POST">
            @csrf
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" placeholder="Nome" required value="{{ old('nome') }}">
            <br><br>

            <label for="autor">Autor: </label>
            <input type="text" name="autor" id="autor" placeholder="Autor" required value="{{ old('autor') }}">
            <br><br>

            <label for="descricao">Descrição: </label>
            <input type="text" name="descricao" id="descricao" placeholder="Descrição" required value="{{ old('descricao') }}">
            <br><br>

            <label for="numpaginas">Número Páginas: </label>
            <input type="number" name="numPaginas" id="numPaginas" min="0" placeholder="Número Páginas" required value="{{ old('numPaginas') }}">
            <br><br>

            <label for="dataPublicacao">Data Publicação: </label>
            <input type="date" name="dataPublicacao" id="dataPublicacao" required value="{{ old('dataPublicacao') }}">
            <br><br>

            <label for="editora">Editora: </label>
            <select name="editora_id" id="editora_id">
                @foreach ($editoras as $editora)
                    <option value="{{ $editora->id }}">{{ $editora->nome }}</option>
                @endforeach
            </select>
            <br><br>

            <label for="custo">Custo: </label>
            <input type="number" name="custo" id="custo" placeholder="Custo" min="0" required value="{{ old('custo') }}">
            <br><br>            

            <label for="preco">Preço: </label>
            <input type="number" name="preco" id="preco" placeholder="Preço" min="0" required value="{{ old('preco') }}">
            <br><br>

            <label for="custo">Custo: </label>
            <input type="number" name="imposto" id="imposto" placeholder="Imposto" min="0" required value="{{ old('imposto') }}">
            <br><br>

            <input type="submit" value="cadastrar">

        </form>

        @if($errors->any())
            <div style="color: red">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </body>
</html>