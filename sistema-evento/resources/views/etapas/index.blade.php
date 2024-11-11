<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Etapas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        form input[type="text"] {
            padding: 10px;
            width: 300px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        form button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #218838;
        }

        .etapas-list {
            list-style-type: none;
            padding: 0;
        }

        .etapas-list li {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 5px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Lista de Etapas</h1>

        <div class="actions">
            <a href="{{ url('/') }}">Voltar para home</a>
            <a href="{{ url('/etapas/create') }}">Cadastrar Nova Etapa</a>
        </div>

        <!-- Formulário de pesquisa -->
        <form action="{{ url('/etapas') }}" method="GET">
            <input type="text" name="search" value="{{ request()->query('search') }}" placeholder="Pesquisar por nome da etapa" />
            <button type="submit"><i class="fas fa-search"></i> Pesquisar</button>
        </form>

        <!-- Exibindo a lista de etapas -->
        <ul class="etapas-list">
            @foreach ($etapas as $etapa)
                <li>
                    <span>{{ $etapa->nome }}</span>
                </li>
            @endforeach
        </ul>

        <!-- Paginação -->
        <div class="pagination">
            {{ $etapas->links() }}
        </div>
    </div>
</body>

</html>
