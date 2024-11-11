<?php
namespace App\Http\Controllers;

use App\Models\EspacoCafe;
use Illuminate\Http\Request;

class EspacoCafeController extends Controller
{
    // Exibe a lista de espaços de café
    public function index(Request $request)
    {
        $query = EspacoCafe::query();

        // Filtrando espaços de café pelo nome
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where('nome', 'like', "%{$searchTerm}%");
        }

        // Paginação de 10 espaços de café por página
        $espacosCafe = $query->paginate(10);  // Definindo a variável correta

        return view('espacos_cafe.index', compact('espacosCafe'));  // Passando a variável correta
    }

    // Exibe o formulário para criar um novo espaço de café
    public function create()
    {
        return view('espacos_cafe.create');
    }

    // Armazena um novo espaço de café no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'lotacao' => 'required|integer',
        ]);

        EspacoCafe::create([
            'nome' => $request->nome,
            'lotacao' => $request->lotacao,
        ]);

        return redirect('/espacos_cafe')->with('success', 'Espaço de café cadastrado com sucesso!');
    }

    // Exibe os detalhes de um espaço de café específico
    public function show($id)
    {
        $espaco = EspacoCafe::findOrFail($id); // Encontra o espaço de café pelo ID
        return view('espacos_cafe.show', compact('espaco'));
    }
}
