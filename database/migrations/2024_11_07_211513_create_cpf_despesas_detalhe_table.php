<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('CPF_despesasDetalhe', function (Blueprint $table) {
            $table->id();
            $table->string('codigoDespesasGrupo', 4);
            $table->string('codigoDespesasDetalhe', 4);
            $table->string('descricaoDespesasDetalhe', 40);
            $table->timestamps();

            // Definindo chave estrangeira
            //$table->foreign('codigoDespesasGrupo')->references('codigoDespesasGrupo')->on('CPF_despesasGrupo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('CPF_despesasDetalhe');
    }
};
