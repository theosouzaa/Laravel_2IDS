<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Setor</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #2563eb, #1e40af);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 450px;
            background: #fff;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .2);
        }

        h1 {
            text-align: center;
            color: #1e3a8a;
            margin-bottom: 25px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .errors {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .errors ul {
            margin-left: 18px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #374151;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            outline: none;
            transition: .3s;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 10px rgba(37, 99, 235, .2);
        }

        .btn {
            width: 100%;
            background: #2563eb;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: .3s;
        }

        .btn:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        .icon {
            text-align: center;
            font-size: 50px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="icon">🏬</div>

        <h1>Cadastro de Setor</h1>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('setor.salvar') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome_setor">Nome do Setor</label>
                <input
                    type="text"
                    name="nome"
                    id="nome_setor"
                    placeholder="Digite o nome do setor"
                    value="{{ old('nome') }}">
            </div>

            <div class="form-group">
                <label for="corredor">Número do Corredor</label>
                <input
                    type="number"
                    name="num_corredor"
                    id="corredor"
                    placeholder="Ex: 12"
                    value="{{ old('num_corredor') }}"
                    required>
            </div>

            <button type="submit" class="btn">
                Cadastrar Setor
            </button>
        </form>

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

</body>

</html>