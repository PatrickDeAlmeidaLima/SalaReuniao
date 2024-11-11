<?php

namespace App\Http\Controllers;

use App\Models\EspacoCafe;
use App\Models\Pessoa;
use App\Models\Sala;
use App\Models\Etapa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        if ($search) {
            $pessoas = Pessoa::with(['salas' => function ($query) {
                $query->withPivot('etapa_id', 'espaco_cafe_id');
            }])
                ->where('nome', 'like', "%{$search}%")
                ->orWhere('sobrenome', 'like', "%{$search}%")
                ->paginate(10);
        } else {
            $pessoas = Pessoa::with(['salas' => function ($query) {
                $query->withPivot('etapa_id', 'espaco_cafe_id');
            }])->paginate(10);
        }

        return view('pessoas.index', compact('pessoas'));
    }

    public function create()
    {
        $salas = Sala::all();
        $etapas = Etapa::all();
        $espacosCafe = EspacoCafe::all();

        return view('pessoas.create', compact('salas', 'etapas', 'espacosCafe'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'sala_id' => 'required|exists:salas,id',
            'etapa_id' => 'required|exists:etapas,id',
            'espaco_cafe_id' => 'required|exists:espaco_cafes,id', 
        ]);

        $pessoa = Pessoa::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
        ]);

        $pessoa->salas()->attach($request->sala_id, [
            'etapa_id' => $request->etapa_id,
            'espaco_cafe_id' => $request->espaco_cafe_id,  
        ]);

        return redirect()->route('pessoas.index')->with('success', 'Pessoa cadastrada com sucesso!');
    }

    public function show($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        return view('pessoas.show', compact('pessoa'));
    }
}
