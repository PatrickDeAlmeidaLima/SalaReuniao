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
        Schema::table('pessoa_sala_etapa', function (Blueprint $table) {
            $table->foreignId('espaco_cafe_id')->constrained('espaco_cafes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pessoa_sala_etapa', function (Blueprint $table) {
            $table->dropForeign(['espaco_cafe_id']);
            $table->dropColumn('espaco_cafe_id');
        });
    }
};
