<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\EtapaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EspacoCafeController;

// Rota principal
Route::get('/', [HomeController::class, 'index']);

// Rotas para pessoas
Route::get('/pessoas', [PessoaController::class, 'index'])->name('pessoas.index');
Route::get('/pessoas/create', [PessoaController::class, 'create']);
Route::post('/pessoas', [PessoaController::class, 'store']);
Route::get('/pessoas/{id}', [PessoaController::class, 'show']);

// Rotas para salas
Route::get('/salas', [SalaController::class, 'index'])->name('salas.index'); 
Route::get('/salas/create', [SalaController::class, 'create']); 
Route::post('/salas', [SalaController::class, 'store']); 
Route::get('/salas/{id}', [SalaController::class, 'show']); 

// Rotas para etapas
Route::get('/etapas', [EtapaController::class, 'index'])->name('etapas.index');
Route::get('/etapas/create', [EtapaController::class, 'create']);
Route::post('/etapas', [EtapaController::class, 'store']); 

// Rotas para café
Route::get('/espacos_cafe', [EspacoCafeController::class, 'index']);
Route::get('/espacos_cafe/create', [EspacoCafeController::class, 'create']);
Route::post('/espacos_cafe', [EspacoCafeController::class, 'store']);
Route::get('/espacos_cafe/{id}', [EspacoCafeController::class, 'show']);


