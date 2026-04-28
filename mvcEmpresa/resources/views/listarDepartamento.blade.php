<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de departamentos</title>
</head>
<body>
    <h1>Lista de departamentos</h1>

    <table>
        <tr>
            <th>Nome</th>
            <th>Data de criação</th>
            <th>Orçamento</th>
            <th>Sigla</th>
        </tr>

        @foreach ($departamentos as $departamento)
            <tr>
                <td>{{ $departamento->nome }}</td>
                <td>{{ $departamento->data_criacao }}</td>
                <td>{{ $departamento->orcamento }}</td>
                <td>{{ $departamento->sigla }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>