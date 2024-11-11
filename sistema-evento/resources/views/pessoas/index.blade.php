<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pessoas</title>
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

        .pessoas-list {
            list-style-type: none;
            padding: 0;
        }

        .pessoas-list li {
            background-color: #ffffff;
            border: 1px solid #ddd;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .pessoas-list li strong {
            font-size: 1.2em;
            color: #333;
        }

        .sala-info {
            background-color: #f8f9fa;
            padding: 15px;
            margin-top: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .sala-info ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sala-info ul li {
            margin: 10px 0;
            font-size: 0.9em;
            color: #555;
        }

        .sala-info ul li strong {
            font-weight: bold;
        }

        .sala-info ul li span {
            color: #007bff;
            font-weight: bold;
        }

        .pessoa-status {
            margin-top: 10px;
            color: #007bff;
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
        <h1>Lista de Pessoas</h1>

        <div class="actions">
            <a href="{{ url('/') }}">Voltar para home</a>
            <a href="{{ url('/pessoas/create') }}">Cadastrar Nova Pessoa</a>
        </div>

        <!-- Formulário de busca -->
        <form action="{{ url('/pessoas') }}" method="GET">
            <input type="text" name="search" value="{{ request()->query('search') }}"
                placeholder="Pesquisar por nome ou sobrenome" />
            <button type="submit"><i class="fas fa-search"></i> Pesquisar</button>
        </form>

        <!-- Exibindo a lista de pessoas -->
        <ul class="pessoas-list">
            @foreach ($pessoas as $pessoa)
                <li>
                    <strong>{{ $pessoa->nome }} {{ $pessoa->sobrenome }}</strong>

                    @if ($pessoa->salas->isEmpty())
                        <p class="pessoa-status">- Sem sala atribuída</p>
                    @else
                        <p class="pessoa-status">- Salas atribuídas:</p>
                        <div class="sala-info">
                            <ul>
                                @foreach ($pessoa->salas as $sala)
                                    <li>
                                        <strong>{{ $sala->nome }} (Capacidade: {{ $sala->lotacao }})</strong>
                                        <br>
                                        - Etapa:
                                        @if ($sala->etapas->isNotEmpty())
                                            <span>{{ $sala->etapas->first()->nome }}</span>
                                        @else
                                            <span>Sem Etapa</span>
                                        @endif
                                        <br>
                                        - Café:
                                        @php
                                            $cafe = \App\Models\EspacoCafe::find($sala->pivot->espaco_cafe_id);
                                        @endphp
                                        {{ $cafe->nome ?? 'Sem Café' }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>

        <div class="pagination">
            {{ $pessoas->links() }}
        </div>
    </div>
</body>

</html>
