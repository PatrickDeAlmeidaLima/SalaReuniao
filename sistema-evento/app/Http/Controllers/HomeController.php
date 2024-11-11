<?php

namespace App\Http\Controllers;

use App\Models\Pessoa; // Ou o modelo correspondente
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $ultimosCadastrados = Pessoa::latest()->take(10)->get(); 

        // Passando os dados para a view home
        return view('home', compact('ultimosCadastrados'));
    }
}
