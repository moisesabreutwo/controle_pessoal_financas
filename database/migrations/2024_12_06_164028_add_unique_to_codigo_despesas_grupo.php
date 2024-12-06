<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('CPF_despesasGrupo', function (Blueprint $table) {
            $table->unique('codigoDespesasGrupo'); // Adicionando restrição única
        });
    }

    public function down(): void
    {
        Schema::table('CPF_despesasGrupo', function (Blueprint $table) {
            $table->dropUnique(['codigoDespesasGrupo']); // Removendo a restrição única
        });
    }
};
