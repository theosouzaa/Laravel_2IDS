<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}"">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
</head>
    <body>

        <h1>Cadastro de Departamento</h1>

        @if(session('success'))
                <p style="color:green">{{ session('success') }}</p>
        @endif

        <form action="{{route('departamentos.salvar')}}" method="POST">
            @csrf

            <label for="">Nome:</label>
            <input type="text" name="setor" id="setor" placeholder="Digite o setor do seu Departamento" required value="{{ old('setor') }}">
            <br><br>

            <label for="">Data de Criação:</label>
            <input type="date" name="data_criacao" id="data_criacao" placeholder="Digite a data de criação" required value="{{ old('data_criacao') }}">
            <br><br>

            <label for="">Orçamento:</label>
            <input type="number" name="orcamento" id="orcamento" placeholder="Digite o orçamento" required value="{{ old('orcamento') }}">
            <br><br>

            <label for="">Sigla do departamento:</label>
            <input type="text" name="sigla" id="sigla" placeholder="Digite a sigla do seu departamento" required value="{{ old('sigla') }}">
            <br><br>

            <input type="submit" value="Cadastrar">

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