<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pessoa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        select,
        button {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        input[type="text"],
        select {
            background-color: #f9f9f9;
        }

        button {
            background-color: #28a745;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .actions a {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .actions a:hover {
            background-color: #0056b3;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group select,
        .form-group input {
            width: 97%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Cadastrar Pessoa</h1>
        <div class="actions">
            <a href="{{ url('/') }}">Voltar para home</a>
        </div>
        <form action="{{ url('/pessoas') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="sobrenome">Sobrenome:</label>
                <input type="text" id="sobrenome" name="sobrenome" required>
            </div>

            <div class="form-group">
                <label for="sala_id">Escolha a Sala:</label>
                <select id="sala_id" name="sala_id" required>
                    @foreach ($salas as $sala)
                        <option value="{{ $sala->id }}">{{ $sala->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="etapa_id">Escolha a Etapa:</label>
                <select id="etapa_id" name="etapa_id" required>
                    @foreach ($etapas as $etapa)
                        <option value="{{ $etapa->id }}">{{ $etapa->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="espaco_cafe_id">Escolha o Espaço de Café:</label>
                <select id="espaco_cafe_id" name="espaco_cafe_id" required>
                    @foreach ($espacosCafe as $espaco)
                        <option value="{{ $espaco->id }}">{{ $espaco->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit"><i class="fas fa-save"></i> Salvar</button>
        </form>
    </div>
</body>

</html>
