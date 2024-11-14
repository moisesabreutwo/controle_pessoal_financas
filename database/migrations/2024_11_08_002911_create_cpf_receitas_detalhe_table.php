<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('CPF_receitasDetalhe', function (Blueprint $table) {
            $table->id();
            $table->string('codigoReceitasGrupo', 4);
            $table->string('codigoReceitasDetalhe', 4);
            $table->string('descricaoReceitasDetalhe', 40);
            $table->timestamps();

            // Definindo chave estrangeira
            //$table->foreign('codigoReceitasGrupo')->references('codigoReceitasGrupo')->on('CPF_receitasGrupo')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('CPF_receitasDetalhe');
    }
};
