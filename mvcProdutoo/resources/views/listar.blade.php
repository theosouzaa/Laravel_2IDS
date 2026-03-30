<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Controle de Produtos</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>QUANTIDADE</th>
                    <th>PREÇO</th>
                    <th>ATUALIZAR</th>
                    <th>DELETAR</th>
                </tr>
            </thead>
            <tbody>
                @forelse($Produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        <td>{{ $produto->preco }}</td>
                        <td>
                            <a href="{{route('produto.atualizar', $produto->id)}}">Atualizar</a>
                        </td>
                        <td>
                            <form action="{{ route('produto.deletar', $produto->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Deletar</button>
                            </form>
                        </td>
                </tr>
                @empty
                    <tr>
                        <td colsoan="3">Nenhum Produto encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </body>
</html>