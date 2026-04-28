<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de funcionários</title>
</head>
<body>
    <h1>Cadastro de Funcionários</h1>

    <form action="">
        <label for="">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Digite o seu nome">
        <br><br>

        <label for="">Sobrenome:</label>
        <input type="text" name="sobrenome" id="sobrenome" placeholder="Digite seu sobrenome">
        <br><br>

        <label for="">Email:</label>
        <input type="text" name="email" id="email" placeholder="Digite seu email">
        <br><br>

        <label for="">Data de nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" placeholder="Digite a sua data de nascimento">
        <br><br>

        <label for="">cargo:</label>
        <input type="text" name="cargo" id="cargo" placeholder="Digite o cargo escolhido">
        </label>

        <label for="">Salário:</label>
        <input type="number" name="salario" id="salario" placeholder="Digite o salário do funcionário">
        <br><br>

        <label for="">Departamento:</label>
            <select name="setor_id" id="setor_id">
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}">{{ $departamento->nome }}</option>
                @endforeach
            </select>
        <br><br>

        <label for="">Data de admissão:</label>
        <input type="date" name="data_admissao" id="data_admissao" placeholder="Digite a data de admissão do funcionário">
        <br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>