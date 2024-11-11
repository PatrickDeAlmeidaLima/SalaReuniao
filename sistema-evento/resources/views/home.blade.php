<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Eventos</title>
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            line-height: 1.6;
            padding: 20px;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            background: linear-gradient(to right, #2980B9, #6DD5FA);
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
            font-size: 36px;
        }

        h2 {
            color: #34495E;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 999;
            animation: fadeIn 0.3s ease-in-out;
        }

        .modal-content {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            width: 80%;
            max-width: 1000px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            animation: slideUp 0.5s ease-out;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header h2 {
            color: #2C3E50;
        }

        .modal-header button {
            background-color: #E74C3C;
            color: #fff;
            border: none;
            padding: 8px 14px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .modal-header button:hover {
            background-color: #C0392B;
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .modal-header button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.5);
        }


        .card-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .card {
            background-color: #fff;
            border-radius: 12px;
            width: 200px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.2);
        }

        .card a {
            display: block;
            background-color: #2980B9;
            color: white;
            text-decoration: none;
            padding: 15px;
            border-radius: 8px;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-color 0.3s ease;
        }

        .card a:hover {
            background-color: #3498DB;
        }

        /* Animações */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .modal-content {
                width: 90%;
                padding: 20px;
            }

            .card-container {
                flex-direction: column;
                align-items: center;
            }
        }

        .table-container {
            width: 80%;
            margin-top: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #2980B9;
            color: white;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 999;
            animation: fadeIn 0.3s ease-in-out;
        }

        .modal-content {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            width: 80%;
            max-width: 1000px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            animation: slideUp 0.5s ease-out;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .modal-content {
                width: 90%;
                padding: 20px;
            }

            .table-container {
                width: 95%;
            }
        }
    </style>
</head>

<body>
    <h1>Bem-vindo ao Sistema de Gestão de Eventos</h1>

    <div class="container">
        <button id="openModalBtn"
            style="background-color: #2980B9; padding: 12px 25px; color: #fff; font-size: 18px; border: none; border-radius: 6px; cursor: pointer; transition: background-color 0.3s;">Abrir
            Opções</button>

        <!-- Modal -->
        <div id="modalOverlay" class="modal-overlay">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Ações</h2>
                    <button id="closeModalBtn">&times;</button>
                </div>
                <div class="card-container">
                    <div class="card">
                        <a href="{{ url('/pessoas/create') }}">Cadastrar Pessoa</a>
                    </div>
                    <div class="card">
                        <a href="{{ url('/salas/create') }}">Cadastrar Sala</a>
                    </div>
                    <div class="card">
                        <a href="{{ url('/etapas/create') }}">Cadastrar Etapa</a>
                    </div>
                    <div class="card">
                        <a href="{{ url('/espacos_cafe/create') }}">Cadastrar Espaço de Café</a>
                    </div>
                </div>
                <div class="modal-header">
                    <h2>Consultas</h2>
                </div>
                <div class="card-container">
                    <div class="card">
                        <a href="{{ url('/pessoas') }}">Consultar Pessoas</a>
                    </div>
                    <div class="card">
                        <a href="{{ url('/salas') }}">Consultar Salas</a>
                    </div>
                    <div class="card">
                        <a href="{{ url('/etapas') }}">Consultar Etapas</a>
                    </div>
                    <div class="card">
                        <a href="{{ url('/espacos_cafe') }}">Consultar Espaços de Café</a>
                    </div>
                </div>
            </div>
        </div>

        <!--  tabela -->
        <div class="table-container">
            <h2>Últimos Cadastrados</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        {{-- <th>Tipo</th> --}}
                        <th>Data de Cadastro</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ultimosCadastrados as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nome }}</td>
                            {{-- <td>{{ $item->tipo }}</td> --}}
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Abre o modal
        const openModalBtn = document.getElementById('openModalBtn');
        const modalOverlay = document.getElementById('modalOverlay');
        const closeModalBtn = document.getElementById('closeModalBtn');

        openModalBtn.addEventListener('click', () => {
            modalOverlay.style.display = 'flex';
        });

        // Fecha o modal
        closeModalBtn.addEventListener('click', () => {
            modalOverlay.style.display = 'none';
        });

        // Fecha o modal ao clicar fora dele
        window.addEventListener('click', (event) => {
            if (event.target === modalOverlay) {
                modalOverlay.style.display = 'none';
            }
        });
    </script>
</body>

</html>
