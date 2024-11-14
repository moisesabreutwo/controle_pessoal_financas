<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('CPF_receitasGrupo', function (Blueprint $table) {
            $table->id();
            $table->string('codigoReceitasGrupo', 4)->unique();
            $table->string('descricaoReceitasGrupo', 40);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('CPF_receitasGrupo');
    }
};
