<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'sobrenome'];

    public function salas()
    {
        return $this->belongsToMany(Sala::class, 'pessoa_sala_etapa')
            ->withPivot('etapa_id', 'espaco_cafe_id') // Para acessar etapa e espaço de café da pivot
            ->withTimestamps();
    }

    public function etapas()
    {
        return $this->belongsToMany(Etapa::class, 'pessoa_sala_etapa')
            ->withPivot('sala_id', 'espaco_cafe_id'); // Necessário para associar corretamente a etapa
    }

    public function espacoCafes()
    {
        return $this->belongsToMany(EspacoCafe::class, 'pessoa_sala_etapa')
            ->withPivot('sala_id', 'etapa_id'); // Acesso ao café via pivot
            
    }
}
