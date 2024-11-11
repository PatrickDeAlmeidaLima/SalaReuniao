<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pessoa_sala_etapa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pessoa_id')->constrained()->onDelete('cascade');
            $table->foreignId('sala_id')->constrained()->onDelete('cascade');
            $table->foreignId('etapa_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoa_sala_etapa');
    }
};


$pessoa = App\Models\Pessoa::create(['nome' => 'João', 'sobrenome' => 'Silva']);
$sala = App\Models\Sala::create(['nome' => 'Sala A', 'lotacao' => 20]);
$etapa = App\Models\Etapa::create(['nome' => 'Etapa 1']);

$pessoa->salas()->attach($sala->id, ['etapa_id' => $etapa->id]);