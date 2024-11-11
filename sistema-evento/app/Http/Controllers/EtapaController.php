<?php

namespace App\Http\Controllers;

use App\Models\Etapa;
use Illuminate\Http\Request;

class EtapaController extends Controller
{
    public function index(Request $request)
    {
        $query = Etapa::query();

        // Filtrando etapas pelo nome
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where('nome', 'like', "%{$searchTerm}%");
        }

        $etapas = $query->paginate(10); // Paginação de 10 etapas por página
        return view('etapas.index', compact('etapas'));
    }

    public function create()
    {
        return view('etapas.create');
    }

    // Método para salvar uma nova etapa
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        // Criação de uma nova etapa
        Etapa::create([
            'nome' => $request->nome,
        ]);

        // Redireciona para a lista de etapas após salvar
        return redirect()->route('etapas.index');
    }
}
