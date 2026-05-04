<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Funcionários</title>
</head>
<body>
    <h1>Lista de Funcionários</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Email</th>
                <th>Cargo</th>
                <th>Salário</th>
                <th>Setor</th>
                <th>Data de Admissão</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->sobrenome }}</td>
                    <td>{{ $funcionario->email }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>{{ $funcionario->salario }}</td>
                    <td>{{ $funcionario->departamento->setor ?? 'Sem departamento' }}</td>
                    <td>{{ $funcionario->data_admissao }}</td>
                    <td>
                        <a href="{{ route('funcionarios.update', $funcionario->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>