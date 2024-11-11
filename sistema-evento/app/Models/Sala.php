<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'lotacao',
    ];

    public function pessoas()
    {
        return $this->belongsToMany(Pessoa::class, 'pessoa_sala_etapa')
            ->withPivot('etapa_id', 'espaco_cafe_id')
            ->withTimestamps();
    }

    public function etapas()
    {
        return $this->belongsToMany(Etapa::class, 'pessoa_sala_etapa')
            ->withPivot('etapa_id')
            ->withTimestamps();
    }

    public function espacoCafe()
    {
        return $this->belongsToMany(EspacoCafe::class, 'pessoa_sala_etapa', 'sala_id', 'espaco_cafe_id')
            ->withPivot('espaco_cafe_id')
            ->withTimestamps();
    }
}
