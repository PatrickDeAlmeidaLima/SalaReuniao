<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index(Request $request)
    {
        $query = Sala::query();

        // Filtrando salas pelo nome
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where('nome', 'like', "%{$searchTerm}%");
        }

        $salas = $query->paginate(10); // Paginação de 10 salas por página
        return view('salas.index', compact('salas'));
    }

    public function create()
    {
        return view('salas.create');
    }

    // Método para salvar uma nova sala
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'lotacao' => 'required|integer',
        ]);

        // Criação de uma nova sala
        Sala::create([
            'nome' => $request->nome,
            'lotacao' => $request->lotacao,
        ]);

        // Redireciona para a lista de salas após salvar
        return redirect()->route('salas.index');
    }

    public function show($id)
    {
        $sala = Sala::findOrFail($id);
        return view('salas.show', compact('sala'));
    }
}
