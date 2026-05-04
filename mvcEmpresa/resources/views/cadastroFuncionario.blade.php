<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}"">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de funcionários</title>
</head>
<body>
    <h1>Cadastro de Funcionários</h1>

    <form action="{{route('funcionarios.salvar')}}" method="POST">
        @csrf
        
        <label for="">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Digite o seu nome" required value="{{ old('nome') }}">
        <br><br>

        <label for="">Sobrenome:</label>
        <input type="text" name="sobrenome" id="sobrenome" placeholder="Digite seu sobrenome" required value="{{ old('sobrenome') }}">
        <br><br>

        <label for="">Email:</label>
        <input type="text" name="email" id="email" placeholder="Digite seu email">
        <br><br>

        <label for="">Cargo:</label>
        <input type="text" name="cargo" id="cargo" placeholder="Digite o cargo escolhido" required value="{{ old('cargo') }}">
        </label>
        <br><br>

        <label for="">Salário:</label>
        <input type="number" name="salario" id="salario" placeholder="Digite o salário do funcionário" required value="{{ old('salario') }}">
        <br><br>

        <label for="">Departamento:</label>
            <select name="departamento_id" id="departamento_id">
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}">{{ $departamento->setor }}</option>
                @endforeach
            </select>
        <br><br>

        <label for="">Data de admissão:</label>
        <input type="date" name="data_admissao" id="data_admissao" placeholder="Digite a data de admissão do funcionário" required value="{{ old('data_admissao') }}">
        <br><br>

        <h3>Informações pessoais</h3>

            <label for="cpf">CPF: </label>
            <input type="number" name="cpf" id="cpf" placeholder="CPF" required value="{{ old('cpf')}}">
            <br><br>

            <label for="rg">RG: </label>
            <input type="number" name="rg" id="rg" placeholder="RG" required value="{{ old('rg')}}">
            <br><br>

            <label for="cep">CEP: </label>
            <input type="number" name="cep" id="cep" placeholder="00000-0000" required value="{{ old('cep')}}">
            <br><br>

            <label for="dataNascimento">Data Nascimento: </label>
            <input type="date" name="dataNascimento" id="dataNascimento" required value="{{ old('dataNascimento')}}">
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