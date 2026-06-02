<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>

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

        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            outline: none;
            background: #fff;
            color: #374151;
            font-size: 15px;
            cursor: pointer;
            transition: .3s;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;

            /* Ícone da seta */
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='%236b7280' viewBox='0 0 16 16'%3E%3Cpath d='M1.5 5.5 8 12l6.5-6.5' stroke='%236b7280' stroke-width='2' fill='none' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 40px;
        }

        select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 10px rgba(37, 99, 235, .2);
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="icon">🏬</div>

        <h1>Cadastro de Usuários</h1>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('usuario.salvar') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome_setor">Nome:</label>
                <input type="text" name="name" id="mame" placeholder="nome" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="corredor">Email</label>
                <input type="email" name="email" id="email" placeholder="email@.com" value="{{ old('email') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="corredor">Senha</label>
                <input type="password" name="password" id="password" placeholder="senha de 6 dígitos"
                    value="{{ old('password') }}" required>
            </div>

            <br>
            <div class="form-group">
                <label for="tipo" id="tipo">
                    <select name="tipo" id="tipo">
                        <option value="usuario">Usuário</option>
                        <option value="adimim">Administrador</option>
                    </select>
                </label>
            </div>

            <button type="submit" value="Entrar" class="btn">
                Cadastrar
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
