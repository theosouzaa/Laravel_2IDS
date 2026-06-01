<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Autores</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f4f7fc;
            min-height: 100vh;
            padding: 30px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        h1 {
            text-align: center;
            color: #1e293b;
            margin-bottom: 30px;
            font-size: 2rem;
        }

        .form-busca-setor {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .search-box {
            flex: 1;
            min-width: 250px;
        }

        .search-box input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #dbe2ea;
            border-radius: 10px;
            outline: none;
            transition: .3s;
            font-size: 14px;
        }

        .search-box input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 10px rgba(37, 99, 235, .15);
        }

        button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: .3s;
        }

        button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #2563eb;
            color: white;
        }

        th {
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
            color: #374151;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .empty {
            text-align: center;
            padding: 25px;
            color: #64748b;
            font-weight: 600;
        }

        .id-badge {
            background: #dbeafe;
            color: #1d4ed8;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
        }

        @media(max-width:768px) {
            body {
                padding: 15px;
            }

            .form-busca-setor {
                flex-direction: column;
            }

            button {
                width: 100%;
            }

            h1 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>✍️ Controle de Autores</h1>

        <form method="GET" action="{{ route('autor.listar') }}" class="form-busca-setor">

            <div class="search-box">
                <input
                    type="text"
                    name="nome"
                    placeholder="Pesquisar nome..."
                    value="{{ request('nome') }}">
            </div>

            <div class="search-box">
                <input
                    type="text"
                    name="telefone"
                    placeholder="Pesquisar telefone..."
                    value="{{ request('telefone') }}">
            </div>

            <button type="submit">
                Buscar
            </button>

        </form>

        <div class="table-responsive">

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>DATA DE NASCIMENTO</th>
                        <th>E-MAIL</th>
                        <th>TELEFONE</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($Autores as $Autor)
                        <tr>
                            <td>
                                <span class="id-badge">
                                    #{{ $Autor->id }}
                                </span>
                            </td>
                            <td>{{ $Autor->nome }}</td>
                            <td>{{ $Autor->dataNascimento }}</td>
                            <td>{{ $Autor->email }}</td>
                            <td>{{ $Autor->telefone }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty">
                                Nenhum autor encontrado ✍️
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>